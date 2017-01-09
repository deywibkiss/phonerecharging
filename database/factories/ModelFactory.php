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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\PasswordReset::class, function (Faker\Generator $faker) {
    return [
        'email'  => $faker->safeEmail,
        'token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'topic' => $faker->word
    ];
});

$factory->define(App\Recharge::class, function (Faker\Generator $faker) {
    return [
        'phone_number'  => $faker->phoneNumber,
        'value' => $faker->randomNumber(5)
    ];
});


$factory->define(App\Cost::class, function (Faker\Generator $faker) {
    return [
        'price'  => $faker->randomNumber()
    ];
});