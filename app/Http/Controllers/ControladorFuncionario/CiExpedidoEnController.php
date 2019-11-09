<?php

namespace App\Http\Controllers;

use App\ModeloFuncionario\CiExpedidoEn;
use Illuminate\Http\Request;

class CiExpedidoEnController extends Controller
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
     * @param  \App\ModeloFuncionario\CiExpedidoEn  $ciExpedidoEn
     * @return \Illuminate\Http\Response
     */
    public function show(CiExpedidoEn $ciExpedidoEn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloFuncionario\CiExpedidoEn  $ciExpedidoEn
     * @return \Illuminate\Http\Response
     */
    public function edit(CiExpedidoEn $ciExpedidoEn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloFuncionario\CiExpedidoEn  $ciExpedidoEn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CiExpedidoEn $ciExpedidoEn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloFuncionario\CiExpedidoEn  $ciExpedidoEn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CiExpedidoEn $ciExpedidoEn)
    {
        //
    }
}
