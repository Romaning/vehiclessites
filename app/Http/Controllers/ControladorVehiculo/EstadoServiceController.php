<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\EstadoService;
use Illuminate\Http\Request;

class EstadoServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $datosestado=EstadoService::all();

        return view('vehiculos.estadosview.indexestado', compact('datosestado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.estadosview.createstado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new EstadoService();
        $estado->est_descripcion = $request->estadoDescripcionNameFront;
        $estado->save();
        return redirect()->route('estado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\EstadoService  $estadoService
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoService $estadoService)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\EstadoService  $estadoService
     * @return \Illuminate\Http\Response
     */
    public function edit($estadoService)
    {
        $datosestado = EstadoService::find($estadoService);
        return view('vehiculos.estadosview.editestado',compact('datosestado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\EstadoService  $estadoService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$estadoService)
    {
        $datosestado = EstadoService::find($estadoService);
        $datosestado->est_descripcion = $request->estadoDescripcionNameFront;
        $datosestado->update();
        return redirect()->route('estado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\EstadoService  $estadoService
     * @return \Illuminate\Http\Response
     */
    public function destroy($estadoService)
    {
        $datosestado = EstadoService::find($estadoService)->delete();
        return redirect()->route('estado.index');
    }
}
