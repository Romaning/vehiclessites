<?php

namespace App\Http\Controllers\ControladorIncidencia;

use App\Http\Controllers\Controller;
use App\ModeloIncidencia\ReclamoDenuncia;
use Illuminate\Http\Request;

class ReclamoDenunciaController extends Controller
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
     * @param  \App\ModeloIncidencia\ReclamoDenuncia  $reclamoDenuncia
     * @return \Illuminate\Http\Response
     */
    public function show(ReclamoDenuncia $reclamoDenuncia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloIncidencia\ReclamoDenuncia  $reclamoDenuncia
     * @return \Illuminate\Http\Response
     */
    public function edit(ReclamoDenuncia $reclamoDenuncia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloIncidencia\ReclamoDenuncia  $reclamoDenuncia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReclamoDenuncia $reclamoDenuncia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloIncidencia\ReclamoDenuncia  $reclamoDenuncia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReclamoDenuncia $reclamoDenuncia)
    {
        //
    }
}
