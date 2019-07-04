<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Chat;
use Faker\Generator as Faker;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 36),
        'friend_id' => $faker->numberBetween($min = 2, $max = 36),
        'chat' => $faker->text($maxNbChars = 150)
    ];
});
