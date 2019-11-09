<?php

namespace App\Http\Controllers\ControladorInfraccion;

use App\Http\Controllers\Controller;
use App\ModeloInfraccion\Infraccion;
use App\ModeloVehiculo\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfraccionController extends Controller
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
        $infracionesInst = Infraccion::all();
        return view('infraciones.indexinfracion', compact('infracionesInst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vehiculos = DB::table('vehiculos')
            ->select('vehiculos.placa_id')
            ->whereNull('vehiculos.deleted_at')
            ->groupBy('vehiculos.placa_id')
            ->get();
        return view('infraciones.createinfraccion', compact('vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infraccion = new Infraccion();
        $infraccion->placa_id = $request->placa_id;
        $infraccion->gestion = $request->gestion;
        $infraccion->fecha_infraccion = $request->fecha_infraccion;
        $infraccion->serie = $request->serie;
        $infraccion->boleta = $request->boleta;
        $infraccion->condigo = $request->condigo;
        $infraccion->descripcion = $request->descripcion;
        $infraccion->monto = $request->monto;
        $infraccion->save();

        return redirect()->route('infraccion.index')->with('alert-success', 'Datos guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloInfraccion\Infraccion $infraccion
     * @return \Illuminate\Http\Response
     */
    public function show(Infraccion $infraccion)
    {
        //
    }
    public function historialInfraccion($placa_id)
    {
        $infracionesInst = DB::table('infraccions')
            ->where('placa_id','=',$placa_id)
            ->whereNull('deleted_at')
            ->orderBy('fecha_infraccion', 'DESC')
            ->get();
        return view('infraciones.historialinfraccion',compact('infracionesInst'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloInfraccion\Infraccion $infraccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Infraccion $infraccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloInfraccion\Infraccion $infraccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infraccion $infraccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloInfraccion\Infraccion $infraccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infraccion $infraccion)
    {
        //
    }
}
