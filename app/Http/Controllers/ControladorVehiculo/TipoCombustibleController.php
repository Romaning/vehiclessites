<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\TipoCombustible;
use Illuminate\Http\Request;

class TipoCombustibleController extends Controller
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
        $datostipo_combustible = TipoCombustible::all();
        return view('vehiculos.tipocombustiblesview.indextipocombustible', compact('datostipo_combustible'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.tipocombustiblesview.createtipocombustible');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datostipo_combustible = new TipoCombustible();
        $datostipo_combustible->tipo_combustible_descripcion = $request->tipo_combustibleDescripcionNameFront;
        $datostipo_combustible->save();
        return redirect()->route('tipo_combustible.index')->with('Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\TipoCombustible  $tipo_combustible
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_combustible)
    {
        $datostipo_combustible = TipoCombustible::find($tipo_combustible);
        return view('vehiculos.tipocombustiblesview.showtipocombustible',compact('datostipo_combustible'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\TipoCombustible  $tipo_combustible
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_combustible)
    {
        $datostipo_combustible = TipoCombustible::find($tipo_combustible);
        return view('vehiculos.tipocombustiblesview.edittipocombustible',compact('datostipo_combustible'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\TipoCombustible  $tipo_combustible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipo_combustible)
    {
        $datostipo_combustible = TipoCombustible::find($tipo_combustible);
        $datostipo_combustible->tipo_combustible_descripcion = $request->tipo_combustibleDescripcionNameFront;
        $datostipo_combustible->save();
        return redirect()->route('tipo_combustible.index')->with('Informacion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\TipoCombustible  $tipo_combustible
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_combustible)
    {
        $datostipo_combustible = TipoCombustible::find($tipo_combustible);
        $datostipo_combustible->delete();
        return redirect()->route('tipo_combustible.index')->with('Elemento eliminado exitosamente');
    }
}
