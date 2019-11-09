<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        /*'btnstoreimges',*/
        /*'dropzone/eliminarimagedropzone',*/
        'documentospropiedadvehiculo/storefile',
        'documentospropiedadvehiculo/deletefile',

        'seguro/store',

        'documentosrenovablevehiculo/docsrenovautocomplet',
        'documentospropiedadvehiculo/docspropautocomplet',

        'imagenesperfilvehiculo/storefile',
        'imagenesperfilvehiculo/imgsperfilautocomplet',
        'imagenesperfilvehiculo/imgsperfilstorefile',
        'imagenesperfilvehiculo/imgsperfildeletefile',

        'documentospropiedadvehiculo/docspropstorefile',
        'documentospropiedadvehiculo/docspropdeletefile',
        'vehiculo',
    ];
}



