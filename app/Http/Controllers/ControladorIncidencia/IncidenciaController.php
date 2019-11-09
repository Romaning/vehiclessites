<?php

namespace App\Http\Controllers\ControladorIncidencia;

use App\Http\Controllers\Controller;
use App\ModeloFuncionario\Funcionario;
use App\ModeloIncidencia\Incidencia;
use App\ModeloIncidencia\TipoIncidencia;
use App\ModeloVehiculo\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenciaController extends Controller
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
        $incidencias = Incidencia::all();
        return view('incidencias.incidenciasview.indexincidencia',compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosvehiculos = Vehiculo::all();
        $datosfuncionarios = Funcionario::all();
        $datostipoincidencias = TipoIncidencia::all();
        return view('incidencias.incidenciasview.createincidencia',
            compact('datosvehiculos','datosfuncionarios','datostipoincidencias'));
    }

    public function consulta(Request $request)
    {
        $vehiculo = $request->placa_id;
        /*##################### VEHICULOS(placa_id)[placa_id=$vehiculo] -> (placa_id)ASIGNACIONS(ci) -> (ci)FUNCIONARIOS ##############*/
        $asignaciones = DB::table('vehiculos')
            ->Join('asignacions','vehiculos.placa_id','=','asignacions.placa_id')
            ->join('funcionarios','funcionarios.ci','=','asignacions.ci')
            ->whereNull('asignacions.deleted_at')
            ->where('vehiculos.placa_id','=',$vehiculo)
            ->get();
        return $asignaciones;
    }

    /**
     * Store a newly created resource in storage.
    array:9 [▼
    "_token" => "X62OCaSiaGkUAcdy7qeUFXrbRJ0V1zAwz7RS5b0F"
    "_method" => "POST"
    "placa_id" => "1147DEK"
    "ci" => "10242587"
    "tipo_incidencia_descripcion" => "ROBO"
    "fecha_incidencia" => "2019-11-04"
    "vehiculo_en_movimiento" => "SI"
    "lugar_incidencia" => "K"
    "descripcion" => "L"
    ]
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidenciaInst = new Incidencia();
        $incidenciaInst->placa_id = $request->placa_id;
        $incidenciaInst->ci = $request->ci;
        $carnet = $request->ci;
        $incidenciaInst->tipo_incidencia_descripcion = $request->tipo_incidencia_descripcion;
        $incidenciaInst->fecha_incidencia = $request->fecha_incidencia;
        if (empty($request->vehiculo_en_movimiento)){
            $incidenciaInst->vehiculo_en_movimiento = "NO";
        }
        else{
            $incidenciaInst->vehiculo_en_movimiento = $request->vehiculo_en_movimiento;
        }
        $incidenciaInst->lugar_incidencia = $request->lugar_incidencia;
        $incidenciaInst->descripcion = $request->descripcion;
        $incidenciaInst->save();

        $funcInst = Funcionario::find($carnet);
        $accidentesFunc = $funcInst->numero_accidentes;
        $accidentesFunc = $accidentesFunc + 1;
        $funcInst->numero_accidentes = $accidentesFunc;
        $funcInst->update();

        return redirect()->back()->with('alert-success','GUARDADO EXITOSAMENTE!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloIncidencia\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show( $incidencia)
    {
        $datosvehiculos = Vehiculo::all();
        $datosfuncionarios = Funcionario::all();
        $datostipoincidencias = TipoIncidencia::all();
        $datosincidencia = Incidencia::find($incidencia);
        return view('incidencias.incidenciasview.showincidencia',
            compact('datosvehiculos','datosfuncionarios',
                'datostipoincidencias','datosincidencia'));
    }

    public function historialPlaca($plac_id){
        /*##################### Vehiculos(placa_id)[placa_id] ->(placa_id)incidencias ##############*/
        $datosincidencias = DB::table('incidencias')
            ->where('placa_id','=',$plac_id)
            ->whereNull('deleted_at')
            ->orderBy('fecha_incidencia','DESC')
            ->get();
        /*dd($datosincidencias);*/
        return view('incidencias.incidenciasview.historialincidencia',compact('datosincidencias'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloIncidencia\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit($incidencia)
    {
        $datosvehiculos = Vehiculo::all();
        $datosfuncionarios = Funcionario::all();
        $datostipoincidencias = TipoIncidencia::all();
        $datosincidencia = Incidencia::find($incidencia);
        return view('incidencias.incidenciasview.editincidencia',
            compact('datosvehiculos','datosfuncionarios',
                'datostipoincidencias','datosincidencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloIncidencia\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $incidencia)
    {
        /*dd($request);*/
        $incidenciaInst = Incidencia::find($incidencia);
        $incidenciaInst->placa_id = $request->placa_id;
        $incidenciaInst->ci = $request->ci;
        $incidenciaInst->tipo_incidencia_descripcion = $request->tipo_incidencia_descripcion;
        $incidenciaInst->fecha_incidencia = $request->fecha_incidencia;
        if (empty($request->vehiculo_en_movimiento)){
            $incidenciaInst->vehiculo_en_movimiento = "NO";
        }
        else{
            $incidenciaInst->vehiculo_en_movimiento = $request->vehiculo_en_movimiento;
        }
        $incidenciaInst->lugar_incidencia = $request->lugar_incidencia;
        $incidenciaInst->descripcion = $request->descripcion;
        $incidenciaInst->update();
        return redirect()->back()->with('alert-success','ACTUALIZADO CORRECTAMENTE!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloIncidencia\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy( $incidencia)
    {
        Incidencia::find($incidencia)->delete();
        return redirect()->back()->with('alert-success','ELIMINADO CORRECTAMENTE!');
    }
}
