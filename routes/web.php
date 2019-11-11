<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('posts', 'PostController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::group( ['middleware' => ['auth']], function() {

});
