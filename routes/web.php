<?php
/* PRUEBA SUBIR ARCHIVOS DE IMAGENES*/
/*Route::get('/indexfile', 'CarpetaControlador\BtnGeneraImgsController@index')->name('indexfile.index');*/
/*BTN STORE IMG 1*/
/*Route::post('/storeimg1', 'CarpetaControlador\BtnGeneraImgsController@storeimg1')->name('storeimg1.store');*/
/*btngeneraimgs BtnGeneraImgsController->storeImagesUECam*/
/*Route::post('/btnstoreimges', 'CarpetaControlador\BtnGeneraImgsController@storeImagesUECam')->name('btnstoreimges.store');*/

/*#################################################### DROPZONE #######################################################*/
Route::prefix('/dropzone')->group(function () {
    /*Route::get('/', 'ImageUploadController@index')->name('dropzone.index');*/
    /*Route::get('/create','ImageUploadController@create')->name('dropzone.create');*/
    /*Route::post('/','ImageUploadController@store')->name('dropzone.store');*/
    /*Route::post('/', 'ImageUploadController@storeFile')->name('dropzone.file.store');*/
    /*Route::get('/{asdsad}','ImageUploadControllerr@asdsad')->name('asdsad.show');
    Route::get('/{asdsad}/edit','ImageUploadController@asdsad')->name('asdsad.edit');
    Route::put('/{asdsad}','ImageUploadController@asdsad')->name('asdsad.update');
    Route::delete('/{archivo_id}','ImageUploadController@destroy')->name('dropzone.destroy');*/
    /*Route::post('/eliminarimagedropzone', 'ImageUploadController@fileDestroy')->name('dropzone.file.destroy');*/
});

/*Route::get('/paginaindex', 'CarpetaControlador\ControllerRoman@index');*/
/*#################################################### VEHICULOS #######################################################*/
/*Route::resource('clase','ControladorVehiculo\ClaseController');*/
Route::prefix('/clase')->group(function () {
    Route::get('/', 'ControladorVehiculo\ClaseController@index')->name('clase.index');
    Route::get('/create', 'ControladorVehiculo\ClaseController@create')->name('clase.create');
    Route::post('/', 'ControladorVehiculo\ClaseController@store')->name('clase.store');
    Route::get('/{clase_id}', 'ControladorVehiculo\ClaseController@show')->name('clase.show');
    Route::get('/{clase_id}/edit', 'ControladorVehiculo\ClaseController@edit')->name('clase.edit');
    Route::put('/{clase_id}', 'ControladorVehiculo\ClaseController@update')->name('clase.update');
    Route::delete('/{clase_id}', 'ControladorVehiculo\ClaseController@destroy')->name('clase.destroy');
});

/*Route::resource('marcas','ControladorVehiculo\ClaseController');*/
Route::prefix('/marca')->group(function () {
    Route::get('/', 'ControladorVehiculo\MarcaController@index')->name('marca.index');
    Route::get('/create', 'ControladorVehiculo\MarcaController@create')->name('marca.create');
    Route::post('/', 'ControladorVehiculo\MarcaController@store')->name('marca.store');
    Route::get('/{marca_id}', 'ControladorVehiculo\MarcaController@show')->name('marca.show');
    Route::get('/{marca_id}/edit', 'ControladorVehiculo\MarcaController@edit')->name('marca.edit');
    Route::put('/{marca_id}', 'ControladorVehiculo\MarcaController@update')->name('marca.update');
    Route::delete('/{marca_id}', 'ControladorVehiculo\MarcaController@destroy')->name('marca.destroy');
});

/*Route::resource('tipo','ControladorVehiculo\TipoController');*/
Route::prefix('/tipo')->group(function () {
    Route::get('/', 'ControladorVehiculo\TipoController@index')->name('tipo.index');
    Route::get('/create', 'ControladorVehiculo\TipoController@create')->name('tipo.create');
    Route::post('/', 'ControladorVehiculo\TipoController@store')->name('tipo.store');
    Route::get('/{tipo_id}', 'ControladorVehiculo\TipoController@show')->name('tipo.show');
    Route::get('/{tipo_id}/edit', 'ControladorVehiculo\TipoController@edit')->name('tipo.edit');
    Route::put('/{tipo_id}', 'ControladorVehiculo\TipoController@update')->name('tipo.update');
    Route::delete('/{tipo_id}', 'ControladorVehiculo\TipoController@destroy')->name('tipo.destroy');
});

/*Route::resource('tipocombustible','ControladorVehiculo\TipoCombustibleController');*/
Route::prefix('/tipocombustible')->group(function () {
    Route::get('/', 'ControladorVehiculo\TipoCombustibleController@index')->name('tipo_combustible.index');
    Route::get('/create', 'ControladorVehiculo\TipoCombustibleController@create')->name('tipo_combustible.create');
    Route::post('/', 'ControladorVehiculo\TipoCombustibleController@store')->name('tipo_combustible.store');
    Route::get('/{tipo_combustible_id}', 'ControladorVehiculo\TipoCombustibleController@show')->name('tipo_combustible.show');
    Route::get('/{tipo_combustible_id}/edit', 'ControladorVehiculo\TipoCombustibleController@edit')->name('tipo_combustible.edit');
    Route::put('/{tipo_combustible_id}', 'ControladorVehiculo\TipoCombustibleController@update')->name('tipo_combustible.update');
    Route::delete('/{tipo_combustible_id}', 'ControladorVehiculo\TipoCombustibleController@destroy')->name('tipo_combustible.destroy');
});

/*Route::resource('tipouso','ControladorVehiculo\TipoUsoController');*/
Route::prefix('/tipouso')->group(function () {
    Route::get('/', 'ControladorVehiculo\TipoUsoController@index')->name('tipo_uso.index');
    Route::get('/create', 'ControladorVehiculo\TipoUsoController@create')->name('tipo_uso.create');
    Route::post('/', 'ControladorVehiculo\TipoUsoController@store')->name('tipo_uso.store');
    Route::get('/{tipo_uso_id}', 'ControladorVehiculo\TipoUsoController@show')->name('tipo_uso.show');
    Route::get('/{tipo_uso_id}/edit', 'ControladorVehiculo\TipoUsoController@edit')->name('tipo_uso.edit');
    Route::put('/{tipo_uso_id}', 'ControladorVehiculo\TipoUsoController@update')->name('tipo_uso.update');
    Route::delete('/{tipo_uso_id}', 'ControladorVehiculo\TipoUsoController@destroy')->name('tipo_uso.destroy');
});

/*Route::resource('estado','ControladorVehiculo\EstadoServicioController');*/
Route::prefix('/estado')->group(function () {
    Route::get('/', 'ControladorVehiculo\EstadoServiceController@index')->name('estado.index');
    Route::get('/create', 'ControladorVehiculo\EstadoServiceController@create')->name('estado.create');
    Route::post('/', 'ControladorVehiculo\EstadoServiceController@store')->name('estado.store');
    Route::get('/{estado_id}', 'ControladorVehiculo\EstadoServiceController@show')->name('estado.show');
    Route::get('/{estado_id}/edit', 'ControladorVehiculo\EstadoServiceController@edit')->name('estado.edit');
    Route::put('/{estado_id}', 'ControladorVehiculo\EstadoServiceController@update')->name('estado.update');
    Route::delete('/{estado_id}', 'ControladorVehiculo\EstadoServiceController@destroy')->name('estado.destroy');
});

/*Route::resource('vehiculo','ControladorVehiculo\VehiculoController');*/
Route::prefix('/vehiculo')->group(function () {
    Route::get('/', 'ControladorVehiculo\VehiculoController@index')->name('vehiculo.index');                    /*##bien exclusive##*/
    Route::get('/create', 'ControladorVehiculo\VehiculoController@create')->name('vehiculo.create');            /*##bien exclusive##*/
    Route::post('/', 'ControladorVehiculo\VehiculoController@store')->name('vehiculo.store');                   /*##bien exclusive##*/
    Route::get('/{vehiculo_id}', 'ControladorVehiculo\VehiculoController@show')->name('vehiculo.show');
    Route::get('/{vehiculo_id}/edit', 'ControladorVehiculo\VehiculoController@edit')->name('vehiculo.edit');
    Route::put('/{vehiculo_id}', 'ControladorVehiculo\VehiculoController@update')->name('vehiculo.update');
    Route::delete('/{vehiculo_id}', 'ControladorVehiculo\VehiculoController@destroy')->name('vehiculo.destroy');
    /*#################################################################################################################################*/
    Route::get('/{vehiculo_id}/showedit', 'ControladorVehiculo\VehiculoController@showEdit')->name('vehiculo.showedit');
    /*#################################################################################################################################*/
    Route::get('/{vehiculo_id}/editsolo', 'ControladorVehiculo\VehiculoController@editSolo')->name('vehiculo.editsolo');              /*##bien##*/
    Route::put('/{vehiculo_id}', 'ControladorVehiculo\VehiculoController@updateSolo')->name('vehiculo.updatesolo');                   /*##bien##*/
    /*Route::delete('/{vehiculo_id}','ControladorVehiculo\VehiculoController@destroySolo')->name('vehiculo.destroysolo');*/              /*##bien##*/
    /*#################################################################################################################################*/
});

/*Route::resource('estservvehi','ControladorVehiculo\EstadoServicioVehiculoController');*/
Route::prefix('/estservvehi')->group(function () {
    Route::get('/', 'ControladorVehiculo\EstadoServicioVehiculoController@index')->name('estservvehi.index');                        /*##bien exclusive##*/
    Route::get('/create', 'ControladorVehiculo\EstadoServicioVehiculoController@create')->name('estservvehi.create');                /*##bien exclusive##*/
    Route::post('/', 'ControladorVehiculo\EstadoServicioVehiculoController@store')->name('estservvehi.store');                       /*##bien exclusive##*/
    Route::get('/{estservvehi_id}', 'ControladorVehiculo\EstadoServicioVehiculoController@show')->name('estservvehi.show');
    Route::get('/{estservvehi_id}/edit', 'ControladorVehiculo\EstadoServicioVehiculoController@edit')->name('estservvehi.edit');
    Route::put('/{estservvehi_id}/', 'ControladorVehiculo\EstadoServicioVehiculoController@update')->name('estservvehi.update');

    Route::delete('/{estservvehi_id}', 'ControladorVehiculo\EstadoServicioVehiculoController@destroy')->name('estservvehi.destroy');
    /*#################################################################################################################################*/
    Route::get('{placa_id}/register', 'ControladorVehiculo\EstadoServicioVehiculoController@registerSolo')->name('estservvehi.registrarsolo'); /*#### bien ####*/
    Route::post('/store', 'ControladorVehiculo\EstadoServicioVehiculoController@storeSolo')->name('estservvehi.storesolo');                         /*#### bien ####*/
    /*#################################################################################################################################*/
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R documentospropiedadvehiculo ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
/*Route::resource('documentospropiedadvehiculo','ControladorVehiculo\DocumentosPropiedadVehiculoController');*/
Route::prefix('/documentospropiedadvehiculo')->group(function () {
    Route::get('/', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@index')->name('documentospropiedadvehiculo.index');
    Route::get('/create', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@create')->name('documentospropiedadvehiculo.create');
    Route::post('/', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@store')->name('documentospropiedadvehiculo.store');
    Route::get('/{documentospropiedadvehiculo_id}', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@show')->name('documentospropiedadvehiculo.show');
    Route::get('/{documentospropiedadvehiculo_id}/edit', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@edit')->name('documentospropiedadvehiculo.edit');
    Route::put('/{documentospropiedadvehiculo_id}', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@update')->name('documentospropiedadvehiculo.update');
    Route::delete('/{documentospropiedadvehiculo_id}', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@destroy')->name('documentospropiedadvehiculo.destroy');

    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
    Route::get('/{documentospropiedadvehiculo_id}/editsolo', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@editSolo')->name('documentospropiedadvehiculo.editsolo');
    Route::post('/docspropautocomplet', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@autocompletarDocsProp')->name('docsprop.autocomplet');
    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/

    /*solo esta linea se usa para guardar files*/
    Route::post('/storefiles', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@storeFileMethodStyde')->name('docsprop.storefilemet');
    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
    Route::post('/docspropstorefile','ControladorVehiculo\DocumentosPropiedadVehiculoController@storeFile')->name('docsprop.storefile');
    Route::post('/docspropdeletefile', 'ControladorVehiculo\DocumentosPropiedadVehiculoController@fileDestroy')->name('docsprop.deletefile');
    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
    Route::post('/consulta', 'ControladorVehiculo\EstadoServicioVehiculoController@consultaUltimoEstado')->name('estservvehi.consulta');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R imagenesperfilvehiculo ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/imagenesperfilvehiculo')->group(function () {
    Route::post('/storefile', 'ControladorVehiculo\ImagenesPerfilVehiculoController@storeFileMethodStyde')->name('imgsperfil.storefilemet');

    Route::get('/', 'ControladorVehiculo\ImagenesPerfilVehiculoController@index')->name('imgsperfil.index');
    Route::get('/{imagenesperfilvehiculo_id}', 'ControladorVehiculo\ImagenesPerfilVehiculoController@show')->name('imgsperfil.show');

    Route::get('/{imgsperfil_id}/editsolo', 'ControladorVehiculo\ImagenesPerfilVehiculoController@editSolo')->name('imgsperfil.editsolo');
    Route::post('/imgsperfilautocomplet', 'ControladorVehiculo\ImagenesPerfilVehiculoController@autocompletarImgsPerfil')->name('imgsperfil.autocomplet');
    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
    Route::post('/imgsperfilstorefile','ControladorVehiculo\ImagenesPerfilVehiculoController@storeFile')->name('imgsperfil.storefile');
    Route::post('/imgsperfildeletefile', 'ControladorVehiculo\ImagenesPerfilVehiculoController@fileDestroy')->name('imgsperfil.deletefile');
    /*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R documentosrenovablevehiculo ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
/*Route::resource('documentosrenovablevehiculo','ControladorVehiculo\DocumentosRenovableVehiculoController');*/
Route::prefix('/documentosrenovablevehiculo')->group(function () {
    Route::get('/', 'ControladorVehiculo\DocumentosRonovableVehiculoController@index')->name('docsrenov.index');
    Route::get('/create', 'ControladorVehiculo\DocumentosRonovableVehiculoController@create')->name('docsrenov.create');
    Route::post('/', 'ControladorVehiculo\DocumentosRonovableVehiculoController@store')->name('docsrenov.store');
    Route::get('/{documentosrenovablevehiculo_id}', 'ControladorVehiculo\DocumentosRonovableVehiculoController@show')->name('docsrenov.show');
    Route::get('/{documentosrenovablevehiculo_id}/edit', 'ControladorVehiculo\DocumentosRonovableVehiculoController@edit')->name('docsrenov.edit');
    Route::put('/{documentosrenovablevehiculo_id}', 'ControladorVehiculo\DocumentosRonovableVehiculoController@update')->name('docsrenov.update');
    Route::delete('/{documentosrenovablevehiculo_id}', 'ControladorVehiculo\DocumentosRonovableVehiculoController@destroy')->name('docsrenov.destroy');
    /*Route::post('/docsrenovautocomplet', 'ControladorVehiculo\DocumentosRonovableVehiculoController@autocompletarDocsRenov')->name('docsrenov.autocomplet');*/
    Route::get('/{vehiculo_id}/historial', 'ControladorVehiculo\DocumentosRonovableVehiculoController@historialPlaca')->name('docsrenov.historial.placa');
    Route::get('/{vehiculo_id}/registrar', 'ControladorVehiculo\DocumentosRonovableVehiculoController@registrarSolo')->name('docsrenov.registrarsolo');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R VEHICULOS ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
/*Route::resource('seguro','ControladorVehiculo\SeguroController');*/
Route::prefix('/seguro')->group(function () {
    Route::get('/', 'ControladorVehiculo\SeguroController@index')->name('seguro.index');
    Route::get('/create', 'ControladorVehiculo\SeguroController@create')->name('seguro.create');
    Route::post('/store', 'ControladorVehiculo\SeguroController@store')->name('seguro.store');
    Route::get('/{seguro_id}', 'ControladorVehiculo\SeguroController@show')->name('seguro.show');
    Route::get('/{seguro_id}/edit', 'ControladorVehiculo\SeguroController@edit')->name('seguro.edit');
    Route::put('/{seguro_id}', 'ControladorVehiculo\SeguroController@update')->name('seguro.update');
    Route::delete('/{seguro_id}', 'ControladorVehiculo\SeguroController@destroy')->name('seguro.destroy');

    Route::get('/{vehiculo_id}/historial', 'ControladorVehiculo\SeguroController@historialSeguros')->name('seguro.historial.placa');
    Route::get('/{seguro_id}/createsolo', 'ControladorVehiculo\SeguroController@createSolo')->name('seguro.createsolo');
    Route::post('/{seguro_id}/update', 'ControladorVehiculo\SeguroController@updateClasis')->name('seguro.update.clasic');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R DEPARTAMENTOS ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/departamento')->group(function () {
    Route::get('/', 'ControladorDepartamento\DepartamentoController@index')->name('departamento.index');
    Route::get('/create', 'ControladorDepartamento\DepartamentoController@create')->name('departamento.create');
    Route::post('/store', 'ControladorDepartamento\DepartamentoController@store')->name('departamento.store');
    Route::get('/{departamento_id}', 'ControladorDepartamento\DepartamentoController@show')->name('departamento.show');
    Route::get('/{departamento_id}/edit', 'ControladorDepartamento\DepartamentoController@edit')->name('departamento.edit');
    Route::put('/{departamento_id}', 'ControladorDepartamento\DepartamentoController@update')->name('departamento.update');
    Route::delete('/{departamento_id}', 'ControladorDepartamento\DepartamentoController@destroy')->name('departamento.destroy');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ESTADO FUNCIONARIO ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/estadofunc')->group(function () {
    Route::get('/', 'ControladorFuncionario\EstadoFuncController@index')->name('estadofunc.index');
    Route::get('/create', 'ControladorFuncionario\EstadoFuncController@create')->name('estadofunc.create');
    Route::post('/store', 'ControladorFuncionario\EstadoFuncController@store')->name('estadofunc.store');
    Route::get('/{estadofunc_id}', 'ControladorFuncionario\EstadoFuncController@show')->name('estadofunc.show');
    Route::get('/{estadofunc_id}/edit', 'ControladorFuncionario\EstadoFuncController@edit')->name('estadofunc.edit');
    Route::put('/{estadofunc_id}', 'ControladorFuncionario\EstadoFuncController@update')->name('estadofunc.update');
    Route::delete('/{estadofunc_id}', 'ControladorFuncionario\EstadoFuncController@destroy')->name('estadofunc.destroy');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R FUNCIONARIOS ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/funcionario')->group(function () {
    Route::get('/', 'ControladorFuncionario\FuncionarioController@index')->name('funcionario.index');
    Route::get('/create', 'ControladorFuncionario\FuncionarioController@create')->name('funcionario.create');
    Route::post('/store', 'ControladorFuncionario\FuncionarioController@store')->name('funcionario.store');
    Route::get('/{funcionario_id}', 'ControladorFuncionario\FuncionarioController@show')->name('funcionario.show');
    Route::get('/{funcionario_id}/edit', 'ControladorFuncionario\FuncionarioController@edit')->name('funcionario.edit');
    Route::put('/{funcionario_id}', 'ControladorFuncionario\FuncionarioController@update')->name('funcionario.update');
    Route::delete('/{funcionario_id}', 'ControladorFuncionario\FuncionarioController@destroy')->name('funcionario.destroy');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ASIGANCIONES ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/asignacion')->group(function () {
    Route::get('/', 'ControladorAsignacionDevolucion\AsignacionController@index')->name('asignacion.index');
    Route::get('/create', 'ControladorAsignacionDevolucion\AsignacionController@create')->name('asignacion.create');
    Route::post('/', 'ControladorAsignacionDevolucion\AsignacionController@store')->name('asignacion.store');
    Route::get('/{asignacion_id}', 'ControladorAsignacionDevolucion\AsignacionController@show')->name('asignacion.show');
    Route::get('/{asignacion_id}/edit', 'ControladorAsignacionDevolucion\AsignacionController@edit')->name('asignacion.edit');
    Route::put('/{asignacion_id}', 'ControladorAsignacionDevolucion\AsignacionController@update')->name('asignacion.update');
    Route::delete('/{asignacion_id}', 'ControladorAsignacionDevolucion\AsignacionController@destroy')->name('asignacion.destroy');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::get('asignacion/{devolucion_id}/a/devolucion', 'ControladorAsignacionDevolucion\AsignacionController@llevarAsigADevolucion')->name('devolucion.asignacion');
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/devolucion')->group(function () {
    Route::get('/', 'ControladorAsignacionDevolucion\DevolucionController@index')->name('devolucion.index');
    Route::get('/create', 'ControladorAsignacionDevolucion\DevolucionController@create')->name('devolucion.create');
    Route::post('/', 'ControladorAsignacionDevolucion\DevolucionController@store')->name('devolucion.store');
    Route::get('/{devolucion_id}', 'ControladorAsignacionDevolucion\DevolucionController@show')->name('devolucion.show');
    Route::get('/{devolucion_id}/edit', 'ControladorAsignacionDevolucion\DevolucionController@edit')->name('devolucion.edit');
    Route::put('/{devolucion_id}', 'ControladorAsignacionDevolucion\DevolucionController@update')->name('devolucion.update');
    Route::delete('/{devolucion_id}', 'ControladorAsignacionDevolucion\DevolucionController@destroy')->name('devolucion.destroy');

});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/vale')->group(function () {
    Route::get('/', 'ControladorValesDeCombustibles\ValesDeCombustibleController@index')->name('vale.index');
    Route::get('/create', 'ControladorValesDeCombustibles\ValesDeCombustibleController@create')->name('vale.create');
    Route::post('/', 'ControladorValesDeCombustibles\ValesDeCombustibleController@store')->name('vale.store');
    Route::get('/{vales_id}', 'ControladorValesDeCombustibles\ValesDeCombustibleController@show')->name('vale.show');
    Route::get('/{vales_id}/edit', 'ControladorValesDeCombustibles\ValesDeCombustibleController@edit')->name('vale.edit');
    Route::put('/{vales_id}', 'ControladorValesDeCombustibles\ValesDeCombustibleController@update')->name('vale.update');
    Route::delete('/{vales_id}', 'ControladorValesDeCombustibles\ValesDeCombustibleController@destroy')->name('vale.destroy');

    Route::get('/{placa_id}/historial', 'ControladorValesDeCombustibles\ValesDeCombustibleController@historialVale')->name('vale.historial.placa');

});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/mantenimiento')->group(function () {
    Route::get('/', 'ControladorMantenimiento\MantenimientoController@index')->name('mantenimiento.index');
    Route::get('/create', 'ControladorMantenimiento\MantenimientoController@create')->name('mantenimiento.create');
    Route::post('/', 'ControladorMantenimiento\MantenimientoController@store')->name('mantenimiento.store');
    Route::get('/{mantenimiento_id}', 'ControladorMantenimiento\MantenimientoController@show')->name('mantenimiento.show');
    Route::get('/{mantenimiento_id}/edit', 'ControladorMantenimiento\MantenimientoController@edit')->name('mantenimiento.edit');
    Route::put('/{mantenimiento_id}', 'ControladorMantenimiento\MantenimientoController@update')->name('mantenimiento.update');
    Route::delete('/{mantenimiento_id}', 'ControladorMantenimiento\MantenimientoController@destroy')->name('mantenimiento.destroy');

    Route::get('/{mantenimiento_id}/historial', 'ControladorMantenimiento\MantenimientoController@historial')->name('mantenimiento.historial.placa');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/infraccion')->group(function () {
    Route::get('/', 'ControladorInfraccion\InfraccionController@index')->name('infraccion.index');
    Route::get('/create', 'ControladorInfraccion\InfraccionController@create')->name('infraccion.create');
    Route::post('/', 'ControladorInfraccion\InfraccionController@store')->name('infraccion.store');
    Route::get('/{infraccion_id}', 'ControladorInfraccion\InfraccionController@show')->name('infraccion.show');
    Route::get('/{infraccion_id}/edit', 'ControladorInfraccion\InfraccionController@edit')->name('infraccion.edit');
    Route::put('/{infraccion_id}', 'ControladorInfraccion\InfraccionController@update')->name('infraccion.update');
    Route::delete('/{infraccion_id}', 'ControladorInfraccion\InfraccionController@destroy')->name('infraccion.destroy');

    Route::get('/{placa_id}/historial', 'ControladorInfraccion\InfraccionController@historialInfraccion')->name('infraccion.historial.placa');
});
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::prefix('/incidencia')->group(function () {
    Route::get('/', 'ControladorIncidencia\IncidenciaController@index')->name('incidencia.index');
    Route::get('/create', 'ControladorIncidencia\IncidenciaController@create')->name('incidencia.create');
    Route::post('/', 'ControladorIncidencia\IncidenciaController@store')->name('incidencia.store');
    Route::get('/{incidencia_id}', 'ControladorIncidencia\IncidenciaController@show')->name('incidencia.show');
    Route::get('/{incidencia_id}/edit', 'ControladorIncidencia\IncidenciaController@edit')->name('incidencia.edit');
    Route::put('/{incidencia_id}', 'ControladorIncidencia\IncidenciaController@update')->name('incidencia.update');
    Route::delete('/{incidencia_id}', 'ControladorIncidencia\IncidenciaController@destroy')->name('incidencia.destroy');

    Route::post('/consulta', 'ControladorIncidencia\IncidenciaController@consulta')->name('incidencia.consulta');
    Route::get('/{incidencia_id}/historial', 'ControladorIncidencia\IncidenciaController@historialPlaca')->name('incidencia.historial.placa');
});
/* &&&&&&&&&&&&&&&&&&&////////////////////////////////////////// R //////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
Route::get('/','PaginaWebController@index')->name('webpage'); /*/*/
Auth::routes();
Route::get('/tablero','ControladorTablero\TableroPrincipalController@index')->name('tablero');/*HOME*/
/* &&&&&&&&&&&&&&&&&&&///////////////////////////////////////// R ///////////////////////////////////////&&&&&&&&&&&&&&&&&&& */
/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');*/
