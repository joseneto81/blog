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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

    //serve para gerar registros de testes, com dados aleatorios, para banco de dados
$factory->define(App\Post::class, function ($faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph
    ];
});

$factory->define(App\Tag::class, function ($faker) {
    return [
        'name' => $faker->word
    ];
});
