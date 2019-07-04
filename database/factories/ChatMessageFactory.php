<?php

use Faker\Generator as Faker;

$factory->define(App\ChatMessage::class, function (Faker $faker) {
	return [
		'channel_id' => 4,
		'author_username' => $faker->name,
		'message' => $faker->paragraph,
	];
});
