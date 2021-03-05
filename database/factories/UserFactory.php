<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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
|
*/

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'profile_image' => 'http://via.placeholder.com/150x150', // avatar
        'password' => '$2y$10$IPW8VWURPByGw5pu/aLQieX7TP6XOtZDzAb6e8MRYAMY6eQ9ae3ne',
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Models\Message::class, function (Faker $faker) {
    do {
        $from = rand(1, 15);
        $to = rand(1, 15);
    } while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
    ];
});
