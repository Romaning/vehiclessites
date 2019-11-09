<?php

namespace App\Http\Controllers\ControladorDepartamento;

use App\Http\Controllers\Controller;
use App\ModeloDepartamento\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     *  Item ::from( 'items as items_alias' )
     * ->join( 'attachments as att', DB::raw( 'att.item_id' ), '=', DB::raw( 'items_alias.id' ) )
     * ->select( DB::raw( 'items_alias.*' ) )
     * ->get();
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosdepartamentos = DB::table('departamentos as depdep')
            ->leftJoin('departamentos as depa', DB::raw('depdep.depende_id'), '=', DB::raw('depa.departamento_id'))
            ->select(DB::raw('depdep.departamento_id'),
                DB::raw('depdep.departamento_nombre as departamento_name'),
                DB::raw('depdep.jefe_id'),
                /* FALTA EL NOMBRE DEL JEFE*/
                DB::raw('depdep.depende_id'),
                DB::raw('depa.departamento_nombre')
            )
            ->whereNull(DB::raw('depdep.deleted_at'))
            ->get();
        /*dd($datosdepartamento);*/
        return view('departamentos.indexdepartemento', compact('datosdepartamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosdepartamento = DB::table('departamentos')
            ->select('departamentos.departamento_id', 'departamentos.departamento_nombre')
            ->whereNull('departamentos.deleted_at')
            ->get();
        return view('departamentos.createdepartemento', compact('datosdepartamento'));
    }

    /**
     * Store a newly created resource in storage.
     * departamento_id
     *departamento_nombre
     * depende_departemento_id
     * jefe_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->departamento_nombre = $request->departamento_nombre;
        $departamento->depende_id = $request->depende_id;
        $departamento->jefe_id = $request->jefe_id;
        $departamento->save();
        return "DEPARTAMENTO GUARDADO CORRECTAMENTE CON ID:" . $departamento->departamento_id;
    }

    /**
     * Collection {#429 ▼
         * #items: array:1 [▼
                 * 0 => {#433 ▼
                 * +"departamento_id": 5
                 * +"departamento_name": "SECRETARÍA MUNICIPAL DE SALUD Y DEPORTES"
                 * +"jefe_id": null
                 * +"depende_id": 1
                 * +"departamento_nombre": "DESPACHO ALCALDESA"
         * }
         * ]
     * }
     */
    public function show($departamento)
    {
        $departamentos = Departamento::all();
        $datosdepartamentos = DB::table('departamentos as depdep')
            ->leftJoin('departamentos as depa', DB::raw('depdep.depende_id'), '=', DB::raw('depa.departamento_id'))
            /*->leftJoin( 'funcionarios as func', DB::raw('depdep.jefe_id), '=',DB::raw('func.jefe_id') */
            ->select(DB::raw('depdep.departamento_id'),
                DB::raw('depdep.departamento_nombre as departamento_name'),
                DB::raw('depdep.jefe_id'),
                /* DB::raw( 'func.ci'),  DB::raw( 'func.nombres'),DB::raw( 'func.apellidos'),*/  /* FALTA EL NOMBRE DEL JEFE*/
                DB::raw('depdep.depende_id'),
                DB::raw('depa.departamento_nombre')
            )
            ->whereNull(DB::raw('depdep.deleted_at'))
            ->where(DB::raw('depdep.departamento_id'), '=', $departamento)
            ->get();
        /*dd($datosdepartamentos);*/
        return view('departamentos.showdepartamento', compact('datosdepartamentos','departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloDepartamento\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($departamento)
    {
        $departamentos = Departamento::all();

        $datosdepartamentos = DB::table('departamentos as depdep')
            ->leftJoin('departamentos as depa', DB::raw('depdep.depende_id'), '=', DB::raw('depa.departamento_id'))
            /*->leftJoin( 'funcionarios as func', DB::raw('depdep.jefe_id), '=',DB::raw('func.jefe_id') */
            ->select(DB::raw('depdep.departamento_id'),
                DB::raw('depdep.departamento_nombre as departamento_name'),
                DB::raw('depdep.jefe_id'),
                /* DB::raw( 'func.ci'),  DB::raw( 'func.nombres'),DB::raw( 'func.apellidos'),*/  /* FALTA EL NOMBRE DEL JEFE*/
                DB::raw('depdep.depende_id'),
                DB::raw('depa.departamento_nombre')
            )
            ->whereNull(DB::raw('depdep.deleted_at'))
            ->where(DB::raw('depdep.departamento_id'), '=', $departamento)
            ->get();
        /*dd($datosdepartamentos);*/
        return view('departamentos.editdepartamento', compact('datosdepartamentos','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloDepartamento\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $departamento)
    {
        $departamento = Departamento::find($departamento);
        $departamento->departamento_nombre = $request->departamento_nombre;
        $departamento->depende_id = $request->depende_id;
        $departamento->jefe_id = $request->jefe_id;
        $departamento->update();
        return "DEPARTAMENTO ACTUALIZADO CORRECTAMENTE ID:" . $departamento->departamento_id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloDepartamento\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($departamento)
    {
        Departamento::find($departamento)->delete();
        return redirect()->route('departamento.index')->with('alert-success','ELIMINADO CORRECTAMENTE');;
    }
}
