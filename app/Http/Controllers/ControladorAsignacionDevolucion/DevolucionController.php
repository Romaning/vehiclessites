<?php

namespace App\Http\Controllers\ControladorAsignacionDevolucion;

use App\Http\Controllers\Controller;
use App\ModeloAsignacionDevolucion\Asignacion;
use App\ModeloAsignacionDevolucion\Devolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()/**/
    {
        /*$datosdevoluciones = DB::select('SELECT * FROM devolucions ORDER BY devolucions.fecha_devolucion DESC');*/
        $datosdevoluciones = DB::table('devolucions')
            ->whereNull('devolucions.deleted_at')
            ->select('devolucions.*')
            ->orderBy('devolucions.fecha_devolucion','DESC')
            ->get();
        /*$datosdevoluciones = Devolucion::all()->sortByDesc('devolucion_id');*/
        return view('devoluciones.indexdevolucion', compact('datosdevoluciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AsigIdPlacaIdCienAsignaciones = DB::table('asignacions')
            ->select('asignacion_id', 'placa_id', 'ci')
            ->whereNull('deleted_at')
            ->get();
        return view('devoluciones.createdevolucion', compact('AsigIdPlacaIdCienAsignaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request);*/
        $placaIdCideAsignaciones = DB::table('asignacions')
            ->select('placa_id', 'ci', 'coord_asig')
            ->where('asignacion_id', '=', $request->asignacion_id)
            ->whereNull('deleted_at')
            ->get();
        $asignacionIdCapturado = $request->asignacion_id;
        $instDevolucion = new Devolucion();
        $instDevolucion->identificador_acta_devolucion = $request->identificador_acta_devolucion;/**/
        $instDevolucion->motivo_devolucion = $request->motivo_devolucion;
        $instDevolucion->fecha_devolucion = $request->fecha_devolucion;/**/
        $instDevolucion->ci = $placaIdCideAsignaciones[0]->ci;/**/
        $instDevolucion->placa_id = $placaIdCideAsignaciones[0]->placa_id; /**/
        $instDevolucion->coord_asig = $placaIdCideAsignaciones[0]->coord_asig;

        if ($request->hasFile('archivo_acta_devolucion')) {
            $archivoImagen = $request->file('archivo_acta_devolucion');
            $nombreImagen = $placaIdCideAsignaciones[0]->ci . "_" . $placaIdCideAsignaciones[0]->placa_id . "_" . $archivoImagen->getClientOriginalName();
            $nombreImagen = str_replace(" ", "_", $nombreImagen);
            $path = public_path() . '/imagenes_store/devoluciones/' . $nombreImagen;
            if (file_exists($path)) {
                unlink($path);
            }
            $archivoImagen->move(public_path('imagenes_store/devoluciones'), $nombreImagen);
            $instDevolucion->archivo_acta_devolucion = $nombreImagen;
        }
        $instDevolucion->save();
        $idInsertado = $instDevolucion->devolucion_id;
        $coord_devo = "D" . $idInsertado;
        $nuevoDevolucionInst = Devolucion::find($idInsertado);
        $nuevoDevolucionInst->coord_devo = $coord_devo;
        $nuevoDevolucionInst->update();

        $instanceAsignaciones = Asignacion::find($asignacionIdCapturado);
        $instanceAsignaciones->coord_devo = $coord_devo;
        $instanceAsignaciones->update();
        $instanceAsignaciones->delete();

        return redirect()->back()->with('alert-success', 'Datos guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloAsignacionDevolucion\Devolucion $devolucion
     * @return \Illuminate\Http\Response
     */
    public function show( $devolucion_id)
    {
        /*dd($devolucion_id);*/ /* TODAS LAS ASIGNACIONES */
        $Asignacion = DB::table('devolucions')
            ->leftJoin('asignacions','devolucions.coord_asig','=','asignacions.coord_asig')
            ->where('devolucions.devolucion_id','=',$devolucion_id)
            ->select('asignacions.coord_asig','asignacions.asignacion_id')
            ->get();

        /*dd($Asignacion[0]->asignacion_id);*/
        $datosAsignaciones = DB::table('asignacions')
            ->join('funcionarios', 'asignacions.ci', '=', 'funcionarios.ci')
            ->join('departamentos', 'funcionarios.departamento_id', '=', 'departamentos.departamento_id')
            ->where('asignacions.asignacion_id', '=', $Asignacion[0]->asignacion_id)
            ->select('asignacions.*', 'funcionarios.nombres', 'funcionarios.apellidos', 'funcionarios.imagen_perfil', 'funcionarios.categoria_licencia',
                'departamentos.departamento_nombre')
            ->get();

        $imagenesPerfilVehiculo = DB::table('asignacions')
            ->join('imagenes_perfil_vehiculos', 'asignacions.placa_id', '=', 'imagenes_perfil_vehiculos.placa_id')
            ->where('asignacions.asignacion_id', '=', $Asignacion[0]->asignacion_id)
            /*->whereNull('asignacions.deleted_at')
            ->whereNull('imagenes_perfil_vehiculos.deleted_at')*/
            ->select('imagenes_perfil_vehiculos.archivo_subido')
            ->get();

        $datosdevoluciones = Devolucion::find($devolucion_id);
        /*dd($datosdevoluciones->all());*/
        return view('devoluciones.showdevolucion', compact('datosdevoluciones','datosAsignaciones','imagenesPerfilVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloAsignacionDevolucion\Devolucion $devolucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Devolucion $devolucion)
    {
        //
    }

/*
$instDevolucion->motivo_devolucion = $request->motivo_devolucion;
$instDevolucion->fecha_devolucion = $request->fecha_devolucion;
$instDevolucion->ci = $placaIdCideAsignaciones[0]->ci;
$instDevolucion->placa_id = $placaIdCideAsignaciones[0]->placa_id;
$instDevolucion->coord_asig = $placaIdCideAsignaciones[0]->coord_asig;

if ($request->hasFile('archivo_acta_devolucion')) {
$archivoImagen = $request->file('archivo_acta_devolucion');
$nombreImagen = $placaIdCideAsignaciones[0]->ci . "_" . $placaIdCideAsignaciones[0]->placa_id . "_" . $archivoImagen->getClientOriginalName();
$nombreImagen = str_replace(" ", "_", $nombreImagen);
$path = public_path() . '/imagenes_store/devoluciones/' . $nombreImagen;
if (file_exists($path)) {
unlink($path);
}
$archivoImagen->move(public_path('imagenes_store/devoluciones'), $nombreImagen);
$instDevolucion->archivo_acta_devolucion = $nombreImagen;
}
$instDevolucion->save();
$idInsertado = $instDevolucion->devolucion_id;
$coord_devo = "D" . $idInsertado;
$nuevoDevolucionInst = Devolucion::find($idInsertado);
$nuevoDevolucionInst->coord_devo = $coord_devo;
$nuevoDevolucionInst->update();

$instanceAsignaciones = Asignacion::find($asignacionIdCapturado);
$instanceAsignaciones->coord_devo = $coord_devo;
$instanceAsignaciones->update();
$instanceAsignaciones->delete();

return "EXITOSAMENTE";
dd($request);
 * */

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloAsignacionDevolucion\Devolucion $devolucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $devolucion)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloAsignacionDevolucion\Devolucion $devolucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devolucion $devolucion)
    {
        //
    }
}
