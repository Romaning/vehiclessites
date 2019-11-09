<?php

namespace App\Http\Controllers\ControladorAsignacionDevolucion;

use App\Http\Controllers\Controller;
use App\ModeloAsignacionDevolucion\Asignacion;
use App\ModeloAsignacionDevolucion\TipoCC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
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
        $datosasiganciones = Asignacion::all();
        return view('asignaciones.indexasignacion', compact('datosasiganciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculosPlacas_NoEstanEnAsignaciones = DB::select(
            'select vehiculos.placa_id
                    from vehiculos
                    where vehiculos.placa_id not in (
                                                        select asignacions.placa_id
                                                        from asignacions
                                                        where asignacions.deleted_at IS NULL
                                                    )
                    AND vehiculos.deleted_at IS NULL /*LOS VEHICULOS ELEIMANDOS SUAVEMENTE NO INGRESAN A ESTA CONSULTA PARA ASIGNACIONES*/
                    '
        );
        /*TRAER TODOS LOS FUNCIONARIOS */
        $funcionariosCi_NoEstanEnAsignaciones = DB::select(
            'select funcionarios.ci
                    from funcionarios
                    where funcionarios.ci not in (
                                                        select asignacions.ci
                                                        from asignacions
                                                        where asignacions.deleted_at IS NULL
                                                    )
                    AND funcionarios.deleted_at IS NULL
                    '/*LOS USARIOS QUE ESTAN ELIMANDOS SUAVEMENTE NO INGRESAN A ESTA CONSULTA*/
        );/**/
        $datosTipoCC = TipoCC::all();
        return view('asignaciones.createasignacion',
            compact('vehiculosPlacas_NoEstanEnAsignaciones',
                'funcionariosCi_NoEstanEnAsignaciones',
                'datosTipoCC'));
    }

    /**
     * Store a newly created resource in storage.
     * "placa_id" => "1147DEK"
     * "ci" => "100078"
     * "fecha_asignacion" => "2019-10-02"
     * "identificador_memorandum" => "A12312312"
     * "tipo_conductor_chofer" => "CHOFER"
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*dd($request);*/
        $instAsignacion = new Asignacion();

        $instAsignacion->identificador_memorandum = $request->identificador_memorandum;/**/
        $instAsignacion->fecha_asignacion = $request->fecha_asignacion;/**/
        $instAsignacion->ci = $request->ci;/**/
        $instAsignacion->placa_id = $request->placa_id; /**/
        $instAsignacion->tipo_conductor_chofer = $request->tipo_conductor_chofer;

        if ($request->hasFile('archivo_memorandum')) {
            $archivoImagen = $request->file('archivo_memorandum');
            $nombreImagen = $request->ci . "_" . $request->placa_id . "_" . $archivoImagen->getClientOriginalName();
            $nombreImagen = str_replace(" ", "_", $nombreImagen);
            $path = public_path() . '/imagenes_store/asignaciones/' . $nombreImagen;
            if (file_exists($path)) {
                unlink($path);
            }
            $archivoImagen->move(public_path('imagenes_store/asignaciones'), $nombreImagen);
            $instAsignacion->archivo_memorandum = $nombreImagen;
        }

        $instAsignacion->save();
        /*obteniendo el id guardado de esta insercion*/
        $asignacion_id = $instAsignacion->asignacion_id;

        $instAsignacionUpdate = Asignacion::find($asignacion_id);
        $instAsignacionUpdate->coord_asig = "A" . $asignacion_id;
        $instAsignacionUpdate->update();

        return redirect()->route('asignacion.index')->with('alert-success', 'Datos guardado correctamente! ID:' . $instAsignacionUpdate->asignacion_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloAsignacionDevolucion\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show($asignacion)
    {
        $datosAsignaciones = DB::table('asignacions')
            ->join('funcionarios', 'asignacions.ci', '=', 'funcionarios.ci')
            ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.departamento_id')
            ->where('asignacions.asignacion_id', '=', $asignacion)
            ->select('asignacions.*', 'funcionarios.nombres', 'funcionarios.apellidos', 'funcionarios.imagen_perfil', 'funcionarios.categoria_licencia',
                'departamentos.departamento_nombre')
            ->get();
        $imagenesPerfilVehiculo = DB::table('asignacions')
            ->join('imagenes_perfil_vehiculos', 'asignacions.placa_id', '=', 'imagenes_perfil_vehiculos.placa_id')
            ->where('asignacions.asignacion_id', '=', $asignacion)
            ->whereNull('asignacions.deleted_at')
            ->whereNull('imagenes_perfil_vehiculos.deleted_at')
            ->select('imagenes_perfil_vehiculos.archivo_subido')
            ->get();
        /*dd($imagenesPerfilVehiculo);*/
        return view('asignaciones.showasignacion', compact('datosAsignaciones', 'imagenesPerfilVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloAsignacionDevolucion\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit($asignacion)
    {
        $vehiculosPlacas_NoEstanEnAsignaciones = DB::select(
            'select vehiculos.placa_id
                    from vehiculos
                    where vehiculos.placa_id not in (
                                                        select asignacions.placa_id
                                                        from asignacions
                                                        where asignacions.deleted_at IS NULL
                                                    )'
        );
        /*dd($vehiculosPlacas_NoEstanEnAsignaciones);*/
        $funcionariosCi_NoEstanEnAsignaciones = DB::select(
            'select funcionarios.ci
                    from funcionarios
                    where funcionarios.ci not in (
                                                        select asignacions.ci
                                                        from asignacions
                                                        where asignacions.deleted_at IS NULL
                                                    )'
        );
        $datosAsignaciones = DB::table('asignacions')
            ->join('funcionarios', 'asignacions.ci', '=', 'funcionarios.ci')
            ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.departamento_id')
            ->where('asignacions.asignacion_id', '=', $asignacion)
            ->select('asignacions.*', 'funcionarios.nombres', 'funcionarios.apellidos', 'funcionarios.imagen_perfil', 'funcionarios.categoria_licencia',
                'departamentos.departamento_nombre')
            ->get();
        $placaci = DB::table('asignacions')
            ->where('asignacions.asignacion_id', '=', $asignacion)
            ->select('placa_id', 'ci')
            ->get();
        $datosTipoCC = TipoCC::all();
        return view('asignaciones.editasignacion',
            compact('vehiculosPlacas_NoEstanEnAsignaciones',
                'funcionariosCi_NoEstanEnAsignaciones',
                'datosTipoCC', 'datosAsignaciones', 'placaci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloAsignacionDevolucion\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asignacion_id)
    {
        /*dd($request);*/
        $instAsignacion = Asignacion::find($asignacion_id);
        $instAsignacion->identificador_memorandum = $request->identificador_memorandum;/**/
        $instAsignacion->fecha_asignacion = $request->fecha_asignacion;/**/
        $instAsignacion->ci = $request->ci;/**/
        $instAsignacion->placa_id = $request->placa_id; /**/
        $instAsignacion->tipo_conductor_chofer = $request->tipo_conductor_chofer;

        $nombreimagen = "";
        $nombreImgParaDarArchivo = "";
        if ($request->hasFile('archivo_memorandum')) {
            /* AHORA QUE YA HEMOS OBTENIDO EL NOMBRE PARA OTROS BENEFICIOS AHORA LO REEMPLAZAMOS*/
            $archivoImagen = $request->file('archivo_memorandum');
            $nombreImagen = $request->ci . "_" . $request->placa_id . "_" . $archivoImagen->getClientOriginalName();
            $nombreImagen = str_replace(" ", "_", $nombreImagen);
            $path = public_path() . '/imagenes_store/asignaciones/' . $nombreImagen;
            if (file_exists($path)) {
                unlink($path);
            }
            $archivoImagen->move(public_path('imagenes_store/asignaciones'), $nombreImagen);
            $instAsignacion->archivo_memorandum = $nombreImagen;
        }
        $instAsignacion->update();
        /*$ciparamostrarmensaje = $funcionario_ci;*/
        /*$funcionario->ci = $request->ci;*/
        return redirect()->route('asignacion.index')->with('alert-success', 'Datos actualizados correctamente! ID: ' . $instAsignacion->asignacion_id);

    }

    /*
     * Collection {#475 ▼
          #items: array:1 [▼
            0 => {#478 ▼
              +"asignacion_id": 11
              +"placa_id": "2911PHC"
              +"ci": 10037191
              +"coord_asig": "A11"
            }
          ]
        }
     * */
    public function llevarAsigADevolucion($asignacion_id)
    {
        /*style="width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"*/
        $AsigIdPlacaIdCienAsignaciones = DB::table('asignacions')
            ->select('asignacion_id', 'placa_id', 'ci', 'coord_asig')
            ->where('asignacion_id', '=', $asignacion_id)
            ->whereNull('deleted_at')
            ->get();
        /*dd($AsigIdPlacaIdCienAsignaciones);*/
        return view('devoluciones.devolucionasignacion', compact('AsigIdPlacaIdCienAsignaciones'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloAsignacionDevolucion\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($asignacion)
    {

    }*/
}
