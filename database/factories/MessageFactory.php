<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {

	$user = App\User::where('user_role','!=', 'admin')->inRandomOrder()->take(1)->get()[0];

	

	
	return [
		'channel_id' => 4,
		'author_username' => $user->name,
		'message' => $faker->paragraph,
	];
});