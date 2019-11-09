<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\TipoUso;
use Illuminate\Http\Request;

class TipoUsoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datostipo_uso = TipoUso::all();
        return view('vehiculos.tipousosview.indextipouso', compact('datostipo_uso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.tipousosview.createtipouso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datostipo_uso = new TipoUso();
        $datostipo_uso->tipo_uso_descripcion = $request->tipo_usoDescripcionNameFront;
        $datostipo_uso->save();
        return redirect()->route('tipo_uso.index')->with('alert-success','GUARDADO CORRECTAMENTE');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\TipoUso  $tipo_uso
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_uso)
    {
        $datostipo_uso = TipoUso::find($tipo_uso);
        return view('vehiculos.tipousosview.showtipouso',compact('datostipo_uso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\TipoUso  $tipo_uso
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_uso)
    {
        $datostipo_uso = TipoUso::find($tipo_uso);
        return view('vehiculos.tipousosview.edittipouso',compact('datostipo_uso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\TipoUso  $tipo_uso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipo_uso)
    {
        $datostipo_uso = TipoUso::find($tipo_uso);
        $datostipo_uso->tipo_uso_descripcion = $request->tipo_usoDescripcionNameFront;
        $datostipo_uso->save();
        return redirect()->route('tipo_uso.index')->with('alert-success','ACTUALIZADO CORRECTAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\TipoUso  $tipo_uso
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_uso)
    {
        $datostipo_uso = TipoUso::find($tipo_uso);
        $datostipo_uso->delete();
        return redirect()->route('tipo_uso.index')->with('alert-success','ELIMINADO CORRECTAMENTE');
    }
}
