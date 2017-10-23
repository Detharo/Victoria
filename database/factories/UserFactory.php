<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'type_user' => rand(1,3),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (faker $faker){
   return [
       'name' => $faker->name,
       'brand' => $faker->text(8),
       'price' => $faker->randomDigitNotNull,
       'quantity' => $faker->randomDigitNotNull,
       'type_product' => rand(1,2),
       'cod_product'=>  str_random(10),
       'des_product'=>$faker->text,
       'cod_status'=> rand(1,4),

   ];
});