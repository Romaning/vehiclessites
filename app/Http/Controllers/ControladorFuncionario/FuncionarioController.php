<?php

namespace App\Http\Controllers\ControladorFuncionario;

use App\Http\Controllers\Controller;
use App\ModeloFuncionario\CategoriaLicencia;
use App\ModeloFuncionario\CiExpedidoEn;
use App\ModeloFuncionario\EstadoFunc;
use App\ModeloFuncionario\Funcionario;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$funcionariosmasvehiculos = DB::table('funcionarios')
            ->join('asignacions')*/
        $datosfuncionario = Funcionario::all();
        return view('funcionarios.funcionariosview.indexfuncionario', compact('datosfuncionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosciexpedicoens = CiExpedidoEn::all();
        $datoscategorialicencias = CategoriaLicencia::all();
        $datosdepartamentos = DB::table('departamentos')
            ->select('departamentos.*')
            ->whereNull('deleted_at')
            ->get();
        $datosestadosfuncs = EstadoFunc::all();
        return view('funcionarios.funcionariosview.createfuncionario', compact('datoscategorialicencias', 'datosciexpedicoens', 'datosestadosfuncs', 'datosdepartamentos'));
    }

    /**
     * _token" => "KOJNGDkrvXDAjkhkgYhchVxYD12hTHvY3Dmd1ktO"
     * "_method" => "POST"
     * "ci" => "10037191"
     * "ci_exped_en" => "LP"
     * "apellidos" => "Valero Calle"
     * "nombres" => "Roman Franco"
     * "fecha_nac" => "1995-10-07"
     * "numero_licencia" => "1234567891011"
     * "categoria_licencia" => "C"
     * "fecha_expedicion_licencia" => "2019-10-10"
     * "fecha_vencimiento_licencia" => "2019-10-31"
     * "numero_accidentes" => "0"
     * "departamento_id" => "38"
     * "contacto" => "76723248"
     * "estado_func_descripcion" => "ACTIVO"
     * +files: FileBag {#56 ▼
     * #parameters: array:1 [▼
     * "imagen_perfil" => UploadedFile {#41 ▼
     * -test: false
     * -originalName: "Camara.jpg"
     * -mimeType: "image/jpeg"
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ci' => 'required|'
        ]);
        $nombreimagen = "";
        if ($request->hasFile('imagen_perfil')) {
            $imagen = $request->file('imagen_perfil');
            $nombreimagen = $request->ci . "_" . $imagen->getClientOriginalName();
            $nombreimagen = str_replace(" ", "_", $nombreimagen);
            $imagen->move(public_path('imagenes_store/funcionarios/' . $request->ci), $nombreimagen);
        }
        $algo = $request->ci;
        $funcionario = new Funcionario();
        $funcionario->ci = $request->ci;
        $funcionario->ci_exped_en = $request->ci_exped_en;
        $funcionario->apellidos = $request->apellidos;
        $funcionario->nombres = $request->nombres;
        $funcionario->fecha_nac = $request->fecha_nac;
        $funcionario->numero_licencia = $request->numero_licencia;
        $funcionario->categoria_licencia = $request->categoria_licencia;
        $funcionario->fecha_expedicion_licencia = $request->fecha_expedicion_licencia;
        $funcionario->fecha_vencimiento_licencia = $request->fecha_vencimiento_licencia;
        $funcionario->numero_accidentes = $request->numero_accidentes;
        $funcionario->departamento_id = $request->departamento_id;
        $funcionario->contacto = $request->contacto;
        $funcionario->estado_func_descripcion = $request->estado_func_descripcion;
        $funcionario->imagen_perfil = $nombreimagen;
        $funcionario->save();

        /*Session::flash('flash_message','successfully saved.'); with('status', 'GUARDADO EXITOSAMENTE EL FUNCIONARIO '.$funcionario->ci.'!')->*/
        return redirect()->route('funcionario.index')/*->with('alert-success', 'The data was saved successfully')*/
        ->with('status', 'GUARDADO EXITOSAMENTE EL FUNCIONARIO ' . $algo . '!');
    }

    /*public function storeM(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:seeders|max:255', 'address' => 'required`enter code here`', 'age' => 'required',]);
        $seeder = new Seeders();
        $seeder->name = $request->input('name');
        $seeder->address = $request->input('address');
        $seeder->age = $request->input('age');
        $seeder->save();
        return redirect()->route("photo.index");
    }*/
    //PUT HERE AFTER YOU SAVE \ } // save data
    //
    /**
     * Display the specified resource.
     *
     * @param \App\ModeloFuncionario\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     **/
    public function show($funcionario)
    {
        $datosfuncionarios = DB::table('funcionarios')
            ->leftJoin('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.departamento_id')
            ->where('funcionarios.ci', '=', $funcionario)
            ->whereNull('funcionarios.deleted_at')
            ->select('funcionarios.*', 'departamentos.departamento_nombre')
            ->get();
        $datosciexpedicoens = CiExpedidoEn::all();
        $datoscategorialicencias = CategoriaLicencia::all();
        $datosdepartamentos = DB::table('departamentos')
            ->select('departamentos.*')
            ->whereNull('deleted_at')
            ->get();
        $datosestadosfuncs = EstadoFunc::all();


        /*#### asignaciones FUNCIONARIOS(ci) -> (ci)Asignacions(placa_id) -> (placa_id)Vehiculos ####*/
        $asiganciones = DB::table('funcionarios')
            ->join('asignacions', 'funcionarios.ci', '=', 'asignacions.ci')
            ->join('vehiculos', 'vehiculos.placa_id', '=', 'asignacions.placa_id')
            ->where('funcionarios.ci', '=', $funcionario)
            /*->whereNull('funcionarios.deleted_at')*/
            ->whereNull('asignacions.deleted_at')
            /*->whereNull('vehiculos.deleted_at') /**/
            ->get();

        /*dd($asiganciones);*/
        if (empty($asiganciones[0]->asignacion_id)) {
            $imagenesPerfilVehiculo = "";
            $datosvehiculo = "";
            $estadoservvehi="";
        } else {
            $imagenesPerfilVehiculo = DB::table('asignacions')
                ->join('imagenes_perfil_vehiculos', 'asignacions.placa_id', '=', 'imagenes_perfil_vehiculos.placa_id')
                ->where('asignacions.asignacion_id', '=', $asiganciones[0]->asignacion_id)
                ->whereNull('asignacions.deleted_at')
                ->whereNull('imagenes_perfil_vehiculos.deleted_at')
                ->select('imagenes_perfil_vehiculos.archivo_subido')
                ->get();

            $datosvehiculo = DB::table('vehiculos')
                ->join('clases', 'clases.clase_id', '=', 'vehiculos.clase_id')
                ->join('marcas', 'marcas.marca_id', '=', 'vehiculos.marca_id')
                ->join('tipos', 'tipos.tipo_id', '=', 'vehiculos.tipo_id')
                ->join('tipo_combustibles', 'tipo_combustibles.tipo_combustible_id', '=', 'vehiculos.tipo_combustible_id')
                ->join('tipo_usos', 'tipo_usos.tipo_uso_id', '=', 'vehiculos.tipo_uso_id')
                ->select('vehiculos.*',
                    'clases.clase_descripcion',
                    'marcas.marca_descripcion',
                    'tipos.tipo_descripcion',
                    'tipo_combustibles.tipo_combustible_descripcion',
                    'tipo_usos.tipo_uso_descripcion')
                ->where('vehiculos.placa_id', '=', $asiganciones[0]->placa_id)
                ->get();
            /*dd($datosvehiculo);*/

            $estadoservvehi = DB::select("SELECT estado_servicio_vehiculos.*, estado_services.est_descripcion
                                    FROM estado_servicio_vehiculos, estado_services
                                    WHERE est_serv_vehiculo_id=(  SELECT MAX(est_serv_vehiculo_id) 
                                                                  FROM estado_servicio_vehiculos 
                                                                  WHERE fecha_inicio = (  SELECT MAX(fecha_inicio) 
                                                                                          FROM estado_servicio_vehiculos 
                                                                                          WHERE placa_id ='" .$asiganciones[0]->placa_id. "'
                                                                                        )
                                                                  AND estado_servicio_vehiculos.placa_id = '".$asiganciones[0]->placa_id."'
                                                                )
                                    AND estado_services.est_id = estado_servicio_vehiculos.est_id
                                    AND estado_servicio_vehiculos.placa_id = '".$asiganciones[0]->placa_id."'
                             ");
        }


        /*dd($imagenesPerfilVehiculo);*/
        return view('funcionarios.funcionariosview.showfuncionario',
            compact('datosfuncionarios',
                'datosciexpedicoens',
                'datoscategorialicencias',
                'datosdepartamentos',
                'datosestadosfuncs', 'asiganciones', 'imagenesPerfilVehiculo','estadoservvehi','datosvehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloFuncionario\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit($funcionario)
    {
        $datosfuncionarios = DB::table('funcionarios')
            ->leftJoin('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.departamento_id')
            ->where('funcionarios.ci', '=', $funcionario)
            ->whereNull('funcionarios.deleted_at')
            ->select('funcionarios.*', 'departamentos.departamento_nombre')
            ->get();
        $datosciexpedicoens = CiExpedidoEn::all();
        $datoscategorialicencias = CategoriaLicencia::all();
        $datosdepartamentos = DB::table('departamentos')
            ->select('departamentos.*')
            ->whereNull('deleted_at')
            ->get();
        $datosestadosfuncs = EstadoFunc::all();
        return view('funcionarios.funcionariosview.editfuncionario',
            compact('datosfuncionarios',
                'datosciexpedicoens',
                'datoscategorialicencias',
                'datosdepartamentos',
                'datosestadosfuncs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloFuncionario\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $funcionario_ci)
    {
        $funcionario = Funcionario::find($funcionario_ci);
        $nombreimagen = "";
        $nombreImgParaDarArchivo = "";
        if ($request->hasFile('imagen_perfil')) {

            /* BUSCAMOS EL ANTIGUO NOMBRE PARA ELIMINAR DE LA BD*/
            $nombreImgParaDarArchivo = DB::table('funcionarios')
                ->where('funcionarios.ci', '=', $funcionario_ci)
                ->select('funcionarios.imagen_perfil')
                ->get();
            if (isset($nombreImgParaDarArchivo)) {
                /* ELIMINAMOS LA IMAGEN DE LA CARPETA DE IMAGENES DEL PROYECTO */
                $path = public_path() . '/imagenes_store/funcionarios/' . $funcionario_ci . "/" . $nombreImgParaDarArchivo[0]->imagen_perfil;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            /* AHORA QUE YA HEMOS OBTENIDO EL NOMBRE PARA OTROS BENEFICIOS AHORA LO REEMPLAZAMOS*/
            $imagen = $request->file('imagen_perfil');
            $nombreimagen = $funcionario_ci . "" . $imagen->getClientOriginalName();
            $nombreimagen = str_replace(" ", "_", $nombreimagen);
            $imagen->move(public_path('imagenes_store/funcionarios/' . $funcionario_ci), $nombreimagen);
            /*  REEMPLAZAMOS EN LA BASE DE DATOS */
            $funcionario->imagen_perfil = $nombreimagen;
        }
        $ciparamostrarmensaje = $funcionario_ci;
        /*$funcionario->ci = $request->ci;*/
        $funcionario->ci_exped_en = $request->ci_exped_en;
        $funcionario->apellidos = $request->apellidos;
        $funcionario->nombres = $request->nombres;
        $funcionario->fecha_nac = $request->fecha_nac;
        $funcionario->numero_licencia = $request->numero_licencia;
        $funcionario->categoria_licencia = $request->categoria_licencia;
        $funcionario->fecha_expedicion_licencia = $request->fecha_expedicion_licencia;
        $funcionario->fecha_vencimiento_licencia = $request->fecha_vencimiento_licencia;
        $funcionario->numero_accidentes = $request->numero_accidentes;
        $funcionario->departamento_id = $request->departamento_id;
        $funcionario->contacto = $request->contacto;
        $funcionario->estado_func_descripcion = $request->estado_func_descripcion;
        $funcionario->update();
        return redirect()->route('funcionario.index')/*->with('alert-success', 'The data was saved successfully')*/
        ->with('status', 'ACTUALIZADO EXITOSAMENTE EL FUNCIONARIO ' . $ciparamostrarmensaje . '!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloFuncionario\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($funcionario_ci)
    {
        $ciparamostrarmensaje = $funcionario_ci;
        $funcionario = Funcionario::find($funcionario_ci);

        /* BUSCAMOS EL ANTIGUO NOMBRE PARA ELIMINAR DE LA BD*/
        $nombreImgParaDarArchivo = DB::table('funcionarios')
            ->where('funcionarios.ci', '=', $funcionario_ci)
            ->select('funcionarios.imagen_perfil')
            ->get();
        if (isset($nombreImgParaDarArchivo)) {
            /* ELIMINAMOS LA IMAGEN DE LA CARPETA DE IMAGENES DEL PROYECTO */
            /*$path = public_path().'/imagenes_store/funcionarios/'.$funcionario_ci."/".$nombreImgParaDarArchivo[0]->imagen_perfil;
            if (file_exists($path)) {
                unlink($path);
            }*/   /*  DESCOMENTAR PARA ELIMINAR LOS ARCHIVOS DE IMAGEN  */
        }
        /*#### asignaciones FUNCIONARIOS(ci) -> (ci)Asignacions(placa_id) -> (placa_id)Vehiculos ####*/
        $asiganciones = DB::table('funcionarios')
            ->join('asignacions', 'funcionarios.ci', '=', 'asignacions.ci')
            ->join('vehiculos', 'vehiculos.placa_id', '=', 'asignacions.placa_id')
            ->where('funcionarios.ci', '=', $funcionario_ci)
            /*->whereNull('funcionarios.deleted_at')*/
            ->whereNull('asignacions.deleted_at')
            /*->whereNull('vehiculos.deleted_at') /**/
            ->get();
        /*dd($asiganciones);*/

        if (empty($asiganciones[0]->asignacion_id)) {
            $funcionario->delete();
            return redirect()->back()/*->with('alert-success', 'The data was saved successfully')*/
            ->with('alert-success', 'FUNCIONARIO ELIMINADO CORRECTAMENTE, PUEDE RESTAURAR!');
            /*->with('alert-danger', ' EL FUNCIONARIO '.$ciparamostrarmensaje.'  NO PUEDE SER ELIMINADO, PORQUE EXISTE UNA ASIGNACION EN LINEA!');*/
        } else {
            return redirect()->back()/*->with('alert-success', 'The data was saved successfully')*/
            ->with('alert-danger', ' EL FUNCIONARIO ' . $ciparamostrarmensaje . '  NO PUEDE SER ELIMINADO, PORQUE EXISTE UNA ASIGNACION EN LINEA!');
        }
    }
}
