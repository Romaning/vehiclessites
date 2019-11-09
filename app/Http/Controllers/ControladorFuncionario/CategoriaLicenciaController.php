<?php

namespace App\Http\Controllers;

use App\ModeloFuncionario\CategoriaLicencia;
use Illuminate\Http\Request;

class CategoriaLicenciaController extends Controller
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
     * @param  \App\ModeloFuncionario\CategoriaLicencia  $categoriaLicencia
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaLicencia $categoriaLicencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloFuncionario\CategoriaLicencia  $categoriaLicencia
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaLicencia $categoriaLicencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloFuncionario\CategoriaLicencia  $categoriaLicencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaLicencia $categoriaLicencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloFuncionario\CategoriaLicencia  $categoriaLicencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaLicencia $categoriaLicencia)
    {
        //
    }
}
