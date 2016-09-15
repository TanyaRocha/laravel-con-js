<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(daf\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(daf\Usuario::class, function (Faker\Generator $faker) {
    return [
        'usr_usuario' => $faker->usr_usuario,
        'usr_prs_id'=>1,
        'usr_clave' => bcrypt(str_random(10)),
        'urs_controlar_ip'=>'N',
        'usr_registrado'=>timestamp('usr_registrado'),
      	'usr_modificado'=>timestamp('usr_modificado'),
        'urs_usr_id'=>1,
        'urs_estado'=>'A',
    ];
});

