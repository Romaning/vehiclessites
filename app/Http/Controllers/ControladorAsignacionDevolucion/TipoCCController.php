<?php

namespace App\Http\Controllers\ControladorAsignacionDevolucion;

use App\Http\Controllers\Controller;
use App\ModeloAsignacionDevolucion\TipoCC;
use Illuminate\Http\Request;

class TipoCCController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloAsignacionDevolucion\TipoCC  $tipoCC
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCC $tipoCC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloAsignacionDevolucion\TipoCC  $tipoCC
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCC $tipoCC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloAsignacionDevolucion\TipoCC  $tipoCC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCC $tipoCC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloAsignacionDevolucion\TipoCC  $tipoCC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCC $tipoCC)
    {
        //
    }
}
