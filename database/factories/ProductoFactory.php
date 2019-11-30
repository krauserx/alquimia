<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Producto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
 'p_codigo', 'p_codigo_barra', 'p_nombre', 'categoria_id', 'p_precio_costo',
         'p_precio_venta', 'p_catidad', 'p_tipo', 'p_descripcion', 'p_url_img'
|
*/

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'p_codigo' => Str::random(6),
        'p_codigo_barra' => Str::random(15),
        'p_nombre' => $faker->name,
        'categoria_id' => '1',
        'p_precio_costo' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) ,
         'p_precio_venta' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
         'p_catidad' => $faker->numberBetween($min = 1000, $max = 9000),
          'p_tipo' => '1',
          'p_descripcion' => $faker->sentence($nbWords = 6, $variableNbWords = true),
          'p_url_img' => 'producto_2614075099963562284.jpeg'
    ];
});
