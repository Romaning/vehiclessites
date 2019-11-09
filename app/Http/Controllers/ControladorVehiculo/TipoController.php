<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
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
        $datostipo = Tipo::all();
        return view('vehiculos.tiposview.indextipo', compact('datostipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.tiposview.createtipo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datostipo = new Tipo();
        $datostipo->tipo_descripcion = $request->tipoDescripcionNameFront;
        $datostipo->save();
        return redirect()->route('tipo.index')->with('alert-success','GUARDADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show($tipo)
    {
        $datostipo = Tipo::find($tipo);
        return view('vehiculos.tiposview.showtipo',compact('datostipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo)
    {
        $datostipo = Tipo::find($tipo);
        return view('vehiculos.tiposview.edittipo',compact('datostipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipo)
    {
        $datostipo = Tipo::find($tipo);
        $datostipo->tipo_descripcion = $request->tipoDescripcionNameFront;
        $datostipo->save();
        return redirect()->route('tipo.index')->with('alert-success','ACTUALIZANDO CORRECTAMENTE');
    }
    /*->with('alert-success','GUARDADO CORRECTAMENTE ID: '.$placa);
               ->with('alert-success','ACTUALIZADO CORRECTAMENTE ID: '.$valesDeCombustiblee);
               ->with('alert-success','ELIMINADO CORRECTAMENTE ID: '.$valedecombustible_id);*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo)
    {
        $datostipo = Tipo::find($tipo);
        $datostipo->delete();
        return redirect()->route('tipo.index')->with('ELEMENTO ELIMINADO CORRECTAMENTE');
    }
}
