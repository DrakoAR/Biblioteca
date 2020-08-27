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
$factory->define(App\Prestamo::class, function (Faker\Generator $faker) {
    $book=App\Book::pluck('id')->toarray();
    $user=App\User::pluck('id')->toarray();

    return [
        'book_id'=>$faker->randomElement($book),     
        'user_id'=>$faker->randomElement($user),
        'devolucion'=>$faker->dateTimeBetween('-10 days','+30days')->format('y-m-d'),     
        'registro_inicio'=>$faker->dateTimeBetween('-30 days','- 5 days')->format('y-m-d'),    
    ];
});
