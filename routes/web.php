<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Factura;
use App\FacturaDetalle;
Route::get('correo', function () {

    $datos =DB::select('SELECT * FROM
    controles
     INNER JOIN personas ON personas.id = controles.persona_id
     INNER JOIN users ON users.id = controles.usario_id
     WHERE
     personas.deleted_at IS NULL ');
dd(  $datos );



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

    Route::resource('pedidos', 'FacturaDetalleController');
    Route::get('/all/categorias', 'FacturaDetalleController@Registro_Total_Pedidos')->name('all.categorias');

    Route::resource('control', 'ControlController');
    Route::get('/all/controles', 'ControlController@Registro_Total_Controles')->name('all.controles');

});
