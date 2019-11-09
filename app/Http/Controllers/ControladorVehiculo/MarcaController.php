<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
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
        $datosmarca = Marca::all();
        return view('vehiculos.marcasview.indexmarca', compact('datosmarca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.marcasview.createmarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosmarca = new Marca();
        $datosmarca->marca_descripcion = $request->marcaDescripcionNameFront;
        $datosmarca->save();
        return redirect()->route('marca.index')->with('Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($marca)
    {
        $datosmarca = Marca::find($marca);
        return view('vehiculos.marcasview.showmarca',compact('datosmarca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($marca)
    {
        $datosmarca = Marca::find($marca);
        return view('vehiculos.marcasview.editmarca',compact('datosmarca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $marca)
    {
        $datosmarca = Marca::find($marca);
        $datosmarca->marca_descripcion = $request->marcaDescripcionNameFront;
        $datosmarca->save();
        return redirect()->route('marca.index')->with('Informacion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($marca)
    {
        $datosmarca = Marca::find($marca);
        $datosmarca->delete();
        return redirect()->route('marca.index')->with('Elemento eliminado exitosamente');
    }
}
