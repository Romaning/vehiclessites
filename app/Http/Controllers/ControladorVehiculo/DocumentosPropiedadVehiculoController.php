<?php

namespace App\Http\Controllers\ControladorVehiculo;

use App\Http\Controllers\Controller;
use App\ModeloVehiculo\DocumentosPropiedadVehiculo;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentosPropiedadVehiculoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*####################################### ################################### ################################ #######################*/
    /*se muestra todos los documentos de propiedad, de todos los automoviles*/
    public function index()
    {
        $datosplaca=[];
        $placas = DB::table('vehiculos')
            ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('documentos_propiedad_vehiculos.placa_id')
            ->whereNull('vehiculos.deleted_at')
            ->groupBy('documentos_propiedad_vehiculos.placa_id')
            ->get();

        for ($i = 0; $i < count($placas); $i++) {
            $datosdocumentospropiedadvehicular = DB::table('vehiculos')
                ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
                ->select('vehiculos.placa_id', 'documentos_propiedad_vehiculos.archivo_subido', 'documentos_propiedad_vehiculos.nombre_documento_propiedad')
                ->where('vehiculos.placa_id', '=', $placas[$i]->placa_id)
                ->get();

            $datosplaca[$i] = array(
                "placa" => $placas[$i]->placa_id,
                "images" => array($datosdocumentospropiedadvehicular),
            );
        }

        /*foreach ($datosplaca as $fila) {
            echo "PLACA :  " . $fila['placa'];
            echo "<br>";
            foreach ($fila['images'] as $dato) {
                foreach ($dato as $atomo) {
                    echo "ATOMO PLACA_ID :  " . $atomo->placa_id;
                    echo "<br>";
                    echo "ARCHIVO SUBIDO :  " . $atomo->archivo_subido;
                    echo "<br>";
                    echo "NOMBRE DOCUMENTO :  " . $atomo->nombre_documento_propiedad;
                    echo "<br>";
                }
                echo "<br>";
            }
        }*/
        return view('vehiculos.documentospropiedadvehiculosview.indexdocspropvehi', compact('datosplaca'));
        /*$datos = [
            "foo" => "bar",
            42 => 24,
            "multi" => array(
                "dimensional" =>
                    array(
                        "array" => "foo"
                    )
            )
        ];*/
    }

    /*####################################### ################################### ################################ #######################*/
    /*esta viene de la pagina de creacion de vehiculos, entra todas las imagenes de golpe, existe una preparacion*/
    public function storeFileMethodStyde(Request $request)
    {
        $filesa = $request->file('file'); /*traemos el array de fotos*/
        $numeroplaca = $request->placa_id;  /*traemos la paca de vehiculo*/
        if (is_array($filesa)) {
            foreach ((array)$filesa as $file) {
                $fileNameOriginal = $file->getClientOriginalName(); /*guardamos el nombre original*/
                $fileNameMorePlaca = $numeroplaca . $fileNameOriginal; /*concatenamos la placa con el nombre original para que no haya duplicidad */
                $fileNameOriginal = str_replace(" ", "_", $fileNameOriginal); /*guardamos el nombre original*/
                $fileNameMorePlaca = str_replace(" ", "_", $fileNameMorePlaca); /*concatenamos la placa con el nombre original para que no haya duplicidad */
                $path = public_path() . '/imagenes_store/documentos/' . $fileNameMorePlaca; /*vemos que ese archivo placa+filename coincida la imagen dentro del public*/
                if (file_exists($path)) {/*vemos si existe el archivo 2720RKF_fotodelantera.jpg, si entonces no ingresa a la bd, sino entonces entra*/
                    /*return "REPETIDO EL ".$fileNameMorePlaca;*/ /*MANDA MENSAJE DE ARCHIVOS REPETIDOS*/
                } else {
                    /*el arhivo original enviado desde form ahora se movera dentro de nuestra carpeta public con otro nombre*/
                    $file->move(public_path('imagenes_store/documentos'), $fileNameMorePlaca); /*es como hacer #move foto.jpg /public/placa+foto.jpg */
                    /*guardamos el nombre de archivo y enlazamos a que placa le pertence*/
                    $imageUpload = new DocumentosPropiedadVehiculo();
                    $imageUpload->archivo_subido = $fileNameMorePlaca;  /*2720RKF_fotodelantera.jpg*/
                    $imageUpload->nombre_documento_propiedad = $fileNameOriginal; /*fotodelantera.jpg*/
                    $imageUpload->placa_id = $numeroplaca; /*2720RKF*/
                    $imageUpload->save();
                }
            }
        } else {
            return "LO SIENTO, NO ES ARRAY";
        }
    }

    public function fileDestroyMethodStyde(Request $request)
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

        $image->move(public_path('imagenes_store/documentos'), $imageName);
        $imageUpload = new DocumentosPropiedadVehiculo();
        $imageUpload->archivo_subido = $imageName;
        $imageUpload->nombre_documento_propiedad = $imageNombreReal;
        $imageUpload->placa_id = $numeroplaca;
        $imageUpload->save();
        /*return redirect()->route('documentospropiedadvehiculo.editsolo', compact('placa'));*/
        return response()->json(['success' => $imageName]);
        /*$image = $request->file('file');
        $numeroplaca = $request->placa;
        $imageName = $numeroplaca . $image->getClientOriginalName();
        $imageNombreReal = $image->getClientOriginalName();*/
        /*$registros = count(DocumentosPropiedadVehiculo::where('archivo_subido',$imageName)->get());*/
        /*$path = public_path() . '/imagenes_store/documentos/' . $imageName;
        if (file_exists($path)) {
            return "YA VLAE";
        } else {
            $image->move(public_path('carpeta_imagenes'), $imageName);
            $imageUpload = new DocumentosPropiedadVehiculo();
            $imageUpload->archivo_subido = $imageName;
            $imageUpload->nombre_documento_propiedad = $imageNombreReal;
            $imageUpload->placa_id = $numeroplaca;
            $imageUpload->save();
            return response()->json(['success' => $imageName]);
        }*/
    }

    public function fileDestroy(Request $request)
    {
        $placa = $request->placa_id;

        $filename = $request->filename;
        $path = public_path() . '/imagenes_store/documentos/' . $filename;

        if (file_exists($path)) {
            unlink($path);
        } else {
            $filename = str_replace(" ", "_", $filename);
            $filename = $placa . '' . $filename;

            $path = public_path() . '/imagenes_store/documentos/' . $filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DocumentosPropiedadVehiculo::where('archivo_subido', $filename)->forceDelete();
        return $filename . " placa: " . $placa;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloVehiculo\DocumentosPropiedadVehiculo $documentosPropiedadVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show( $vehiculo_placa)
    {
        $datosplaca=[];
        $placas = DB::table('vehiculos')
            ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('documentos_propiedad_vehiculos.placa_id')
            ->where('documentos_propiedad_vehiculos.placa_id','=',$vehiculo_placa)
            ->whereNull('vehiculos.deleted_at')
            ->groupBy('documentos_propiedad_vehiculos.placa_id')
            ->get();

        for ($i = 0; $i < count($placas); $i++) {
            $datosdocumentospropiedadvehicular = DB::table('vehiculos')
                ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
                ->select('vehiculos.placa_id', 'documentos_propiedad_vehiculos.archivo_subido', 'documentos_propiedad_vehiculos.nombre_documento_propiedad')
                ->where('vehiculos.placa_id', '=', $placas[$i]->placa_id)
                ->get();

            $datosplaca[$i] = array(
                "placa" => $placas[$i]->placa_id,
                "images" => array($datosdocumentospropiedadvehicular),
            );
        }
        return view('vehiculos.documentospropiedadvehiculosview.showimgporplaca', compact('datosplaca'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloVehiculo\DocumentosPropiedadVehiculo $documentosPropiedadVehiculo
     * @return \Illuminate\Http\Response
     */


    public function edit(DocumentosPropiedadVehiculo $documentosPropiedadVehiculo)
    {
        //
    }

    public function editSolo($vehiculo)
    {
        $datosdocumentospropiedadvehicular = DB::table('vehiculos')
            ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('vehiculos.placa_id', 'documentos_propiedad_vehiculos.archivo_subido', 'documentos_propiedad_vehiculos.nombre_documento_propiedad')
            ->where('vehiculos.placa_id', '=', $vehiculo)
            ->whereNull('deleted_at')
            /*->get()*/;
        return view('vehiculos.documentospropiedadvehiculosview.editdocspropvehiSolo', compact('datosdocumentospropiedadvehicular', 'vehiculo'));
    }


    /* ########################################### VIENE DESDE EDIT DOCS PROPIEDAD SOLO #######################################*/
    /*para llenar la zona de dropzone*/
    public function autocompletarDocsProp(Request $request)
    {
        $requiere = 1;
        if (isset($request->requerimiento)) {
            $requiere = $request->requerimiento;
        }
        if ($requiere == 2) {
            $lista_array_archivos = array();
            $directorio = public_path() . '/imagenes_store/documentos/';
        }

        $datosdocumentospropiedadvehicular = DB::table('vehiculos')
            ->join('documentos_propiedad_vehiculos', 'documentos_propiedad_vehiculos.placa_id', '=', 'vehiculos.placa_id')
            ->select('vehiculos.placa_id', 'documentos_propiedad_vehiculos.archivo_subido', 'documentos_propiedad_vehiculos.nombre_documento_propiedad')
            /*->whereNull('deleted_at')*/
            ->where('vehiculos.placa_id', '=', $request->placa_id)
            ->get();

        foreach ($datosdocumentospropiedadvehicular as $file) {
            /*$size = filesize($directorio."".$file->archivo_subido);*/
            $lista_array_archivos[] = array('nombre' => $file->archivo_subido, 'tamano' => "2MB", 'carpetamasarchivo' => 'imagenes_store/documentos/' . $file->archivo_subido, 'path' => $directorio);
        }
        return response()->json($lista_array_archivos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloVehiculo\DocumentosPropiedadVehiculo $documentosPropiedadVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentosPropiedadVehiculo $documentosPropiedadVehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloVehiculo\DocumentosPropiedadVehiculo $documentosPropiedadVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentosPropiedadVehiculo $documentosPropiedadVehiculo)
    {
        //
    }
}
