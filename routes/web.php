<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Empresa;
Route::get('correo', function () {

    $query = Empresa::all();
    dd($query );

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
    Route::get('/all/persona', 'PersonaController@Registro_Total_Personas')->name('all.persona');

});
