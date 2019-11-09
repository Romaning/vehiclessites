<?php

namespace App\Http\Controllers;

use App\ModeloFuncionario\TelefonoFuncionario;
use Illuminate\Http\Request;

class TelefonoFuncionarioController extends Controller
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
     * @param  \App\ModeloFuncionario\TelefonoFuncionario  $telefonoFuncionario
     * @return \Illuminate\Http\Response
     */
    public function show(TelefonoFuncionario $telefonoFuncionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloFuncionario\TelefonoFuncionario  $telefonoFuncionario
     * @return \Illuminate\Http\Response
     */
    public function edit(TelefonoFuncionario $telefonoFuncionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloFuncionario\TelefonoFuncionario  $telefonoFuncionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelefonoFuncionario $telefonoFuncionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloFuncionario\TelefonoFuncionario  $telefonoFuncionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelefonoFuncionario $telefonoFuncionario)
    {
        //
    }
}
