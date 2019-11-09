<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\DocumentosRonovableVehiculo;
use App\ModeloVehiculo\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentosRonovableVehiculoController extends Controller
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
        $datosdocsrenov = DB::table('documentos_ronovable_vehiculos')
            ->select('documentos_ronovable_vehiculos.*')
            ->orderBy('placa_id')
            ->orderBy('gestion')
            ->get();
        $placasdedocrenov = DB::table('documentos_ronovable_vehiculos')
            ->select('documentos_ronovable_vehiculos.placa_id')
            ->orderBy('placa_id')
            ->groupBy('placa_id')
            ->get();
        $n = count($placasdedocrenov);
        return view('vehiculos.documentosrenovablevehiculosview.indexdocsrenovvehi',compact('datosdocsrenov','placasdedocrenov','n'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $placas = DB::table('vehiculos')
            ->select('placa_id')
            ->get();
        return view('vehiculos.documentosrenovablevehiculosview.createdocsrenovvehi',compact('placas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());*/
        $docsrenovables = new DocumentosRonovableVehiculo();
        $docsrenovables->gestion = $request->gestion;
        $docsrenovables->fecha_fin_cobertura_soat = $request->fecha_fin_cobertura_soat;

        if (isset($request->bsisa)) {
            $docsrenovables->bsisa = $request->bsisa;
        } else {
            $docsrenovables->bsisa = "0";
        }
        if (isset($request->inspeccion_vehicular)) {
            $docsrenovables->inspeccion_vehicular = $request->inspeccion_vehicular;
        } else {
            $docsrenovables->inspeccion_vehicular = "0";
        }

        $docsrenovables->placa_id = $request->placa_id;
        $docsrenovables->save();
        return "EXITO";
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloVehiculo\DocumentosRonovableVehiculo $documentosRonovableVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($documentosRonovableVehiculo)
    {
        //
    }
    public function registrarSolo($vehiculo){
        return view('vehiculos.documentosrenovablevehiculosview.registrardocsrenovvehiSolo',compact('vehiculo'));
    }

    public function historialPlaca($vehiculo)
    {
        $datosdocsrenov = DB::table('documentos_ronovable_vehiculos')
            ->select('documentos_ronovable_vehiculos.*')
            ->where('documentos_ronovable_vehiculos.placa_id','=',$vehiculo)
            ->orderBy('gestion','ASC')
            ->get();

        return view('vehiculos.documentosrenovablevehiculosview.historialdocsrenov',compact('datosdocsrenov','vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloVehiculo\DocumentosRonovableVehiculo $documentosRonovableVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($documentosRonovableVehiculo)
    {
        $datosdocrenov = DocumentosRonovableVehiculo::find($documentosRonovableVehiculo);
        return view('vehiculos.documentosrenovablevehiculosview.editdocsrenovvehi', compact('datosdocrenov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloVehiculo\DocumentosRonovableVehiculo $documentosRonovableVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $documentosRonovableVehiculo)
    {
        $docsrenovables = DocumentosRonovableVehiculo::find($documentosRonovableVehiculo);

        $docsrenovables->gestion = $request->gestion;
        $docsrenovables->fecha_fin_cobertura_soat = $request->fecha_fin_cobertura_soat;

        if (isset($request->bsisa)) {
            $docsrenovables->bsisa = $request->bsisa;
        } else {
            $docsrenovables->bsisa = "0";
        }
        if (isset($request->inspeccion_vehicular)) {
            $docsrenovables->inspeccion_vehicular = $request->inspeccion_vehicular;
        } else {
            $docsrenovables->inspeccion_vehicular = "0";
        }
        $docsrenovables->placa_id = $request->placa_id;
        $docsrenovables->update();

        return "Actualizado" /* redirect()->back()->with('alert-success', 'Datos actualizados correctamente!')*/;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloVehiculo\DocumentosRonovableVehiculo $documentosRonovableVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($documentosRonovableVehiculo)
    {
        //
    }
}
