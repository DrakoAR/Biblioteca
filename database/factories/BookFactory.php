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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Book::class, function (Faker\Generator $faker) {
    
$title=$faker->sentence(3);
    return [
        'name'=>$title,
        'autor' => $faker->name,
        'cantidad'=>$faker->randomDigitNotNull,
        'año'=>$faker->year($min='now', $max='2100'),
        'volumen'=>$faker->randomDigit,
        'referencia'=>$faker->randomElement(['L1A','L1B','L1C','L1D','L1E','L1F']),
        'categoria'=>$faker->randomElement(['revistas','libros','actas','tesis']),
        
    ];
});
