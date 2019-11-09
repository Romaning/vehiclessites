<?php

namespace App\Http\Controllers\ControladorFuncionario;

use App\Http\Controllers\Controller;
use App\ModeloFuncionario\EstadoFunc;
use Illuminate\Http\Request;

class EstadoFuncController extends Controller
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
        $estadofunc = EstadoFunc::all();
        return view('funcionarios.estadofuncsview.indexestadofunc',compact('estadofunc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.estadofuncsview.createestadofunc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estadofunc = new EstadoFunc();
        $estadofunc->estado_func_descripcion=$request->estado_func_descripcion;
        $estadofunc->save();
        return redirect()->route('estadofunc.index')->with('alert-success','GUARDADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloFuncionario\EstadoFunc  $estadoFunc
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoFunc $estadoFunc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloFuncionario\EstadoFunc  $estadoFunc
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoFunc $estadoFunc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloFuncionario\EstadoFunc  $estadoFunc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoFunc $estadoFunc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloFuncionario\EstadoFunc  $estadoFunc
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoFunc $estadoFunc)
    {
        //
    }
}
