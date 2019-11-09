<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\ImagenesPerfilVehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagenesPerfilVehiculoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function storeFileMethodStyde(Request $request)
    {
        /*dd($request->all);*/
        $files = $request->file('file'); /*traemos el array de fotos*/
        $numeroplaca=$request->placa_id;  /*traemos la paca de vehiculo*/
        foreach($files as $file){
            $fileNameOriginal=$file->getClientOriginalName(); /*guardamos el nombre original*/
            $fileNameOriginal = str_replace(" ", "_", $fileNameOriginal);

            $fileNameMorePlaca = $numeroplaca.$fileNameOriginal; /*concatenamos la placa con el nombre original para que no haya duplicidad */
            $path=public_path().'/imagenes_store/vehiculos/'.$fileNameMorePlaca; /*vemos que ese archivo placa+filename coincida la imagen dentro del public*/

            /*guardamos el nombre de archivo y enlazamos a que placa le pertence*/
            $imageUpload = new ImagenesPerfilVehiculo();
            $imageUpload->archivo_subido = $fileNameMorePlaca;  /*2720RKF_fotodelantera.jpg*/
            $imageUpload->nombre_imagen_perfil = $fileNameOriginal; /*fotodelantera.jpg*/
            $imageUpload->placa_id=$numeroplaca; /*2720RKF*/
            $imageUpload->save();

            if (!file_exists($path)) {/*vemos si existe el archivo 2720RKF_fotodelantera.jpg, si entonces solo registramos en la bd ingresa a la bd, sino entonces movemos el archivo*/
                /*return "REPETIDO EL ".$fileNameMorePlaca;*/ /*MANDA MENSAJE DE ARCHIVOS REPETIDOS*/
                $file->move(public_path('imagenes_store/vehiculos'),$fileNameMorePlaca); /*es como hacer #move foto.jpg /public/placa+foto.jpg */
                /*el if si no se mueve el archivo, en el else si se mueve porque no hay en fisico*/
                /*el arhivo original enviado desde form ahora se movera dentro de nuestra carpeta public con otro nombre*/
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosplaca=[];
        $placas = DB::table('vehiculos')
            ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('imagenes_perfil_vehiculos.placa_id')
            ->whereNull('vehiculos.deleted_at')
            ->groupBy('imagenes_perfil_vehiculos.placa_id')
            ->get();

        for ($i = 0; $i < count($placas); $i++) {
            $datosimagenperfilvehicular = DB::table('vehiculos')
                ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
                ->select('vehiculos.placa_id', 'imagenes_perfil_vehiculos.archivo_subido', 'imagenes_perfil_vehiculos.nombre_imagen_perfil')
                ->where('vehiculos.placa_id', '=', $placas[$i]->placa_id)
                ->get();

            $datosplaca[$i] = array(
                "placa" => $placas[$i]->placa_id,
                "images" => array($datosimagenperfilvehicular),
            );
        }

        return view('vehiculos.imgsperfilvehiculo.indeximgvehiculo', compact('datosplaca'));
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
    public function storeFile(Request $request)
    {
        $numeroplaca = $request->placa_id;
        $image = $request->file('file');

        $imageName = $numeroplaca . $image->getClientOriginalName();
        $imageName = str_replace(" ", "_", $imageName);

        $imageNombreReal = $image->getClientOriginalName();
        $imageNombreReal = str_replace(" ", "_", $imageNombreReal);

        $image->move(public_path('imagenes_store/vehiculos'), $imageName);
        $imageUpload = new ImagenesPerfilVehiculo();
        $imageUpload->archivo_subido = $imageName;
        $imageUpload->nombre_imagen_perfil = $imageNombreReal;
        $imageUpload->placa_id = $numeroplaca;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $placa = $request->placa_id;

        $filename = $request->filename;
        $path = public_path() . '/imagenes_store/vehiculos/' . $filename;

        if (file_exists($path)) {
            unlink($path);
        } else {
            $filename = str_replace(" ", "_", $filename);
            $filename = $placa . '' . $filename;

            $path = public_path() . '/imagenes_store/vehiculos/' . $filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        ImagenesPerfilVehiculo::where('archivo_subido', $filename)->forceDelete();
        return $filename . " placa: " . $placa;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ModeloVehiculo\ImagenesPerfilVehiculo  $imagenesPerfilVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($imagenesPerfilVehiculo_placa_id)
    {
        $datosplaca=[];
        $placas = DB::table('vehiculos')
            ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('imagenes_perfil_vehiculos.placa_id')
            ->where('imagenes_perfil_vehiculos.placa_id','=',$imagenesPerfilVehiculo_placa_id)
            ->whereNull('vehiculos.deleted_at')
            ->groupBy('imagenes_perfil_vehiculos.placa_id')
            ->get();

        for ($i = 0; $i < count($placas); $i++) {
            $datosimagenperfilvehicular = DB::table('vehiculos')
                ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
                ->select('vehiculos.placa_id', 'imagenes_perfil_vehiculos.archivo_subido', 'imagenes_perfil_vehiculos.nombre_imagen_perfil')
                ->where('vehiculos.placa_id', '=', $placas[$i]->placa_id)
                ->get();

            $datosplaca[$i] = array(
                "placa" => $placas[$i]->placa_id,
                "images" => array($datosimagenperfilvehicular),
            );
        }
        return view('vehiculos.imgsperfilvehiculo.showimgporplaca', compact('datosplaca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModeloVehiculo\ImagenesPerfilVehiculo  $imagenesPerfilVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(ImagenesPerfilVehiculo $imagenesPerfilVehiculo)
    {
        //
    }

    public function editSolo($vehiculo)
    {
        $datosimgsperfilvehiculos = DB::table('vehiculos')
            ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('vehiculos.placa_id', 'imagenes_perfil_vehiculos.archivo_subido', 'imagenes_perfil_vehiculos.nombre_imagen_perfil')
            ->where('vehiculos.placa_id', '=', $vehiculo)
            ->whereNull('deleted_at')
            /*->get()*/;
        return view('vehiculos.imgsperfilvehiculo.editimgvehiculoSolo', compact('datosimgsperfilvehiculos', 'vehiculo'));
    }


    /* ########################################### VIENE DESDE EDIT DOCS PROPIEDAD SOLO #######################################*/
    /*para llenar la zona de dropzone*/
    public function autocompletarImgsPerfil(Request $request)
    {
        $requiere = 1;
        if (isset($request->requerimiento)) {
            $requiere = $request->requerimiento;
        }
        if ($requiere == 2) {
            $lista_array_archivos = array();
            $directorio = public_path() . '/imagenes_store/vehiculos/';
        }

        $datosimgsperfilvehiculos = DB::table('vehiculos')
            ->join('imagenes_perfil_vehiculos', 'imagenes_perfil_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('vehiculos.placa_id', 'imagenes_perfil_vehiculos.archivo_subido', 'imagenes_perfil_vehiculos.nombre_imagen_perfil')
            ->where('vehiculos.placa_id', '=', $request->placa_id)
            ->get();

        foreach ($datosimgsperfilvehiculos as $file) {
            /*$size = filesize($directorio."".$file->archivo_subido);*/
            $lista_array_archivos[] = array('nombre' => $file->archivo_subido, 'tamano' => "2MB", 'carpetamasarchivo' => 'imagenes_store/vehiculos/' . $file->archivo_subido, 'path' => $directorio);
        }
        return response()->json($lista_array_archivos);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModeloVehiculo\ImagenesPerfilVehiculo  $imagenesPerfilVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImagenesPerfilVehiculo $imagenesPerfilVehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModeloVehiculo\ImagenesPerfilVehiculo  $imagenesPerfilVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImagenesPerfilVehiculo $imagenesPerfilVehiculo)
    {
        //
    }
}
