<?php

namespace App\Http\Controllers\ControladorMantenimiento;

use App\Http\Controllers\Controller;
use App\ModeloMantenimiento\TipoMantenimiento;
use Illuminate\Http\Request;

class TipoMantenimientoController extends Controller
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
     * @param  \App\ModeloMantenimiento\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMantenimiento $tipoMantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloMantenimiento\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMantenimiento $tipoMantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloMantenimiento\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMantenimiento $tipoMantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloMantenimiento\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMantenimiento $tipoMantenimiento)
    {
        //
    }
}
