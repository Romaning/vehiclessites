<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\ModeloVehiculo\EstadoService;
use App\ModeloVehiculo\EstadoServicioVehiculo;
use App\ModeloVehiculo\Vehiculo;
use App\ModeloVehiculo\Clase;
use App\ModeloVehiculo\DocumentosPropiedadVehiculo;
use App\ModeloVehiculo\DocumentosRonovableVehiculo;
use App\ModeloVehiculo\ImagenesPerfilVehiculo;
use App\ModeloVehiculo\Marca;
use App\ModeloVehiculo\Seguro;
use App\ModeloVehiculo\Tipo;
use App\ModeloVehiculo\TipoCombustible;
use App\ModeloVehiculo\TipoUso;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoServicioVehiculoController extends Controller
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
        $datosestservvehi = DB::table('estado_servicio_vehiculos')
            ->join('estado_services', 'estado_services.est_id', '=', 'estado_servicio_vehiculos.est_id')
            ->select('estado_servicio_vehiculos.*', 'estado_services.est_descripcion')
            ->whereNull('estado_servicio_vehiculos.deleted_at')
            ->get();
        return view('vehiculos.estadoserviciovehiculosview.indexestadovehiculo', compact('datosestservvehi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $placas = DB::table('vehiculos')
            ->select('placa_id')
            ->get();
        $datosestado = EstadoService::all();

        /*if (isset($datosestado)){
            return "NO EXISTE NINGUN DATO";
        }
        else{*/
            /*dd($datosestado);*/
            return view('vehiculos.estadoserviciovehiculosview.createestadovehiculo', compact('placas', 'datosestado'));
        /*}*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estservvehiculo = new EstadoServicioVehiculo();
        $datosestado = EstadoService::all();
        $estservvehiculo->fecha_inicio = $request->fecha_inicio;
        $estservvehiculo->motivo = $request->motivo;
        if (isset($request->est_id)) {
            $estservvehiculo->est_id = $request->est_id;
        } else {
            $fueradeservi = DB::table('estado_services')
                ->select('estado_services.est_id')
                ->where("estado_services.est_descripcion", '=', 'FUERA DE SERVICIO')
                ->get();
            $estservvehiculo->est_id = $fueradeservi[0]->est_id;
        }
        $estservvehiculo->placa_id = $request->placa_id;

        $estservvehiculo->save();
        return "EXITO EN REGISTRAR ESTADO SERVICIO";
    }

    public function registerSolo(Request $request)
    {
        $datosestado = EstadoService::all();
        $placa_id = $request->placa_id;
        $estadoservvehi = DB::select("SELECT estado_servicio_vehiculos.*, estado_services.est_descripcion
                                    FROM estado_servicio_vehiculos, estado_services
                                    WHERE est_serv_vehiculo_id=(  SELECT MAX(est_serv_vehiculo_id) 
                                                                  FROM estado_servicio_vehiculos 
                                                                  WHERE fecha_inicio = (  SELECT MAX(fecha_inicio) 
                                                                                          FROM estado_servicio_vehiculos 
                                                                                          WHERE placa_id ='" .$placa_id. "'
                                                                                        )
                                                                  AND estado_servicio_vehiculos.placa_id = '".$placa_id."'
                                                                )
                                    AND estado_services.est_id = estado_servicio_vehiculos.est_id
                             ");
        return view('vehiculos.estadoserviciovehiculosview.registrarestadosolo',compact('placa_id','estadoservvehi', 'datosestado'));
    }

    public function storeSolo(Request $request)
    {
        $estservvehiculo = new EstadoServicioVehiculo();

        $estservvehiculo->fecha_inicio = $request->fecha_inicio;
        $estservvehiculo->motivo = $request->motivo;
        if (isset($request->est_id)) {
            $estservvehiculo->est_id = $request->est_id;
        } else {
            $fueradeservi = DB::table('estado_services')
                ->select('estado_services.est_id')
                ->where("estado_services.est_descripcion", '=', 'FUERA DE SERVICIO')
                ->get();
            $estservvehiculo->est_id = $fueradeservi[0]->est_id;
        }
        $estservvehiculo->placa_id = $request->placa_id;

        $estservvehiculo->save();
        return "EXITO EN GUARDAR EST_SERV_VEHICULO";
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloVehiculo\EstadoServicioVehiculo $estadoServicioVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($estadoServicioVehiculo)
    {

        $placa_id = "2720RKF";

        $estservvehi = DB::table('estado_servicio_vehiculos')
            ->where('placa_id', '=', $placa_id)
            ->max('fecha_inicio');

        $idmaximo = DB::table('estado_servicio_vehiculos')
            ->where('placa_id', '=', $placa_id)
            ->where('fecha_inicio', '=', $estservvehi)
            ->get();

        $datosa = DB::select("SELECT estado_servicio_vehiculos.*, estado_services.est_descripcion
                                    FROM estado_servicio_vehiculos, estado_services
                                    WHERE est_serv_vehiculo_id=(  SELECT MAX(est_serv_vehiculo_id) 
                                                                  FROM estado_servicio_vehiculos 
                                                                  WHERE fecha_inicio = (  SELECT MAX(fecha_inicio) 
                                                                                          FROM estado_servicio_vehiculos 
                                                                                          WHERE placa_id ='2720RKF'
                                                                                        )
                                                                  AND estado_servicio_vehiculos.placa_id = '2720RKF'
                                                                )
                                    AND estado_services.est_id = estado_servicio_vehiculos.est_id
                             ");
       /* $datosaa=DB::table("estado_servicio_vehiculos")
            ->select("estado_servicio_vehiculos.*")
            ->where("est_serv_vehiculo_id","=", function($query){
                $query->select("MAX(est_serv_vehiculo_id)")
                    ->from("estado_servicio_vehiculos")
                    ->where("fecha_inicio","=",function($quers){
                        $quers->select("MAX(fecha_inicio)")
                            ->from("estado_servicio_vehiculos")
                            ->where("placa_id","2720RKF");
                    }
                    )
                    ->where("placa_id","=","2720RKF");
            }
            )->get();*/
        dd($datosa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloVehiculo\EstadoServicioVehiculo $estadoServicioVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($estadoServicioVehiculo)
    {
        $datosestservvehi = DB::table('estado_servicio_vehiculos')
            ->join('estado_services','estado_services.est_id','=','estado_servicio_vehiculos.est_id')
            ->select('estado_servicio_vehiculos.est_serv_vehiculo_id',
                'estado_servicio_vehiculos.fecha_inicio',
                'estado_servicio_vehiculos.motivo',
                'estado_servicio_vehiculos.est_id',
                'estado_servicio_vehiculos.placa_id',
                'estado_services.est_descripcion')
            ->where('estado_servicio_vehiculos.est_serv_vehiculo_id','=',$estadoServicioVehiculo)
            ->get();
        $datosestado = EstadoService::all();
        return view('vehiculos.estadoserviciovehiculosview.editestadovehiculo', compact('datosestado','datosestservvehi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloVehiculo\EstadoServicioVehiculo $estadoServicioVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $estadoServicioVehiculo)
    {
        $estservvehiculo = EstadoServicioVehiculo::find($estadoServicioVehiculo);

        $estservvehiculo->fecha_inicio = $request->fecha_inicio;
        $estservvehiculo->motivo = $request->motivo;
        if (isset($request->est_id)) {
            $estservvehiculo->est_id = $request->est_id;
        } else {
            $fueradeservi = DB::table('estado_services')
                ->select('estado_services.est_id')
                ->where("estado_services.est_descripcion", '=', 'FUERA DE SERVICIO')
                ->get();
            $estservvehiculo->est_id = $fueradeservi[0]->est_id;
        }
        $estservvehiculo->placa_id = $request->placa_id;

        $estservvehiculo->update();
        return "ACTUALIZADO CORRECTAMENTE";
    }
    public function consultaUltimoEstado(Request $request){
        $placa_id = $request->placa_id;
        $estadoservvehi = DB::select("SELECT estado_servicio_vehiculos.*, estado_services.est_descripcion
                                    FROM estado_servicio_vehiculos, estado_services
                                    WHERE est_serv_vehiculo_id=(  SELECT MAX(est_serv_vehiculo_id) 
                                                                  FROM estado_servicio_vehiculos 
                                                                  WHERE fecha_inicio = (  SELECT MAX(fecha_inicio) 
                                                                                          FROM estado_servicio_vehiculos 
                                                                                          WHERE placa_id ='" .$placa_id. "'
                                                                                        )
                                                                  AND estado_servicio_vehiculos.placa_id = '".$placa_id."'
                                                                )
                                    AND estado_services.est_id = estado_servicio_vehiculos.est_id
                             ");
        return $estadoservvehi;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloVehiculo\EstadoServicioVehiculo $estadoServicioVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($estadoServicioVehiculo)
    {
        EstadoServicioVehiculo::find($estadoServicioVehiculo)->delete();
        return redirect()->back()->with('alert-success','ELIMINADO CORRECTAMENTE');
    }
}
