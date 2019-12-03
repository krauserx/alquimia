<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\FacturaPago;
use App\MetodoPago;
Route::get('correo', function () {
    $metodoPago = MetodoPago::all();
    $pagos_registrados = FacturaPago::where('factura_id', '=', 4)->get();


    });

    Route::get('/clear', function() {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        //$exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('view:clear');
        return 'DONE'; //Return anything
    });


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
    //Route::get('empresa', 'EmpresaController@index')->name('empresa');
    Route::resource('empresa', 'EmpresaController');

    Route::resource('users', 'UserController');
    Route::get('/all/usurios', 'UserController@Registro_Total_Usurios')->name('all.usurios');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('posts', 'PostController');

    Route::resource('personas', 'PersonaController');
    Route::get('/all/personas', 'PersonaController@Registro_Total_Personas')->name('all.personas');

    Route::resource('categorias', 'CategoriaController');
    Route::get('/all/categorias', 'CategoriaController@Registro_Total_Categorias')->name('all.categorias');

    Route::resource('productos', 'ProductoController');
    Route::get('/all/productos', 'ProductoController@Registro_Total_Productos')->name('all.productos');
    Route::get('productos/validarcodigoproducto/ejecutar', 'ProductoController@ejecutar')->name('validarcodigoproducto.ejecutar');

    Route::resource('carro', 'FacturaController');
    Route::get('/all/productos_facturas', 'FacturaController@lista_producto_en_factura')->name('all.productos_facturas');//todos los productos en factura
    Route::post('facturas/detalle/proceder', 'FacturaController@actualizar_cantidad_bd')->name('detalle.proceder');
    Route::post('facturas/detalle/pedido', 'FacturaController@ejecutar_pedido')->name('realizar.pedido');
    Route::post('facturas/aprobar/pedido', 'FacturaController@aprobar_pedido')->name('aprobar.pedido');
    Route::post('facturas/rechazar/pedido', 'FacturaController@rechzar_pedido')->name('rechazar.pedido');
    Route::post('facturas/pagos/proceder', 'FacturaController@crear_metodos_pagos_facturas')->name('pagos.proceder');


    Route::resource('pedidos', 'FacturaDetalleController');
    Route::get('/all/fact', 'FacturaDetalleController@Registro_Total_Pedidos')->name('all.fact');

    Route::resource('control', 'ControlController');
    Route::get('/all/controles', 'ControlController@Registro_Total_Controles')->name('all.controles');
    Route::get('facturas.index.clientes', 'ControlController@buscar_cliente')->name('facturas.clientes');

    Route::resource('perfil', 'PerfilController');//
    Route::get('/all/perfil', 'PerfilController@Registro_Total_MiControles')->name('control.historico');

    Route::resource('perfil/show', 'BitacoraEntregaController');//

    Route::get('crear_reporte/{tipo}', 'PDFController@crear_detallePedidos');
    Route::get('crear_reporte_productos/{tipo}', 'PDFController@crear_reporte_productos');


});
