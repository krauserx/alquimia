<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Persona;
Route::get('correo', function () {

    $query = Persona::find(4);
    //dd($query);
    //dd($query->persona_contacto() );
    $data = Persona::findOrFail(4);
    $resultado = array();
    foreach ($data->persona_contacto as $role =>$row) {
      $resultado[] = [
        'id'=>$row['id'],
        'tipo_dato_id'=>$row['tipo_dato_id'],
        'c_info'=>$row['c_info']
    ];

}
foreach ($resultado as $role =>$row) {
    echo $row['tipo_dato_id'];

}


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

});
