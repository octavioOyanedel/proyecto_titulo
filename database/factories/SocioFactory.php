<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Socio;
use Faker\Generator as Faker;

$factory->define(Socio::class, function (Faker $faker) {
    return [
        'rut' => $faker->numberBetween(90000000, 290000000),
        'nombre1' => $faker->firstName(),
        'nombre2' => $faker->firstName(),
        'apellido1' => $faker->lastName(),
        'apellido2' => $faker->lastName(),        
        'genero' => $faker->randomElement(['Varón', 'Dama']),
        'fecha_nac' => $faker->dateTimeBetween('-69 years', '-20 years'),
        'celular' => $faker->numberBetween(900000000, 999999999),
        'correo' => $faker->safeEmail(),
        'direccion' => $faker->address(),
        'fecha_pucv' => $faker->dateTimeBetween('-19 years', '-14 years'),
        'anexo' => $faker->numberBetween(2000, 4999),
        'numero_socio' => rand(1, 99999999),
        'fecha_sind1' => $faker->dateTimeBetween('-13 years', 'now'),
        'comuna_id' => 6,
        'ciudad_id' => $faker->numberBetween(27, 33),
        'sede_id' => 1,
        'area_id' => $faker->numberBetween(1, 55),
        'cargo_id' => $faker->numberBetween(1, 8),
        'estado_socio_id' => 1,
        'nacionalidad_id' => 2
    ];
});
