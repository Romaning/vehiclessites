<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
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
        $datosclase=Clase::all();
        return view('vehiculos.clasesview.indexclases',compact('datosclase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.clasesview.createclase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clasebackend= new Clase();
        $clasebackend->clase_descripcion = $request->claseDescripcionNameFront;
        $clasebackend->save();

        return redirect()->back()->with('alert-success','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show($clase)
    {
        $datosallclase = Clase::find($clase);
        return view('vehiculos.clasesview.showclase',compact('datosallclase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit($clase)
    {
        $datosclase = Clase::find($clase);
        return view('vehiculos.clasesview.editclase',compact('datosclase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$clase)
    {
        $datosclase = Clase::find($clase);
        $datosclase->clase_descripcion = $request->claseDescripcionNameFront;
        $datosclase->save();
        return redirect()->route('clase.index')->with('Informacion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy($clase)
    {
        $datosclase = Clase::find($clase);
        $datosclase->delete();
        return redirect()->back()->with('alert-success','Elemento eliminado exitosamente');
    }
}
