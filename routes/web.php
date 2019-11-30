<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Factura;
use App\FacturaDetalle;
Route::get('correo', function () {
    $buscarDtalleFactId = FacturaDetalle::where('factura_id',8)
                ->where('producto_id', 1)
                ->get();
                foreach ($buscarDtalleFactId as $key) {
                    $numeroFactura = $key->factura_id;
                }
                echo $numeroFactura;
    //dd($buscarDtalleFactId);
    //dd(session()->get('NumeroFactura'));




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

});
