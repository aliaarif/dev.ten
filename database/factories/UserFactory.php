<?php
use App\Country;
use App\State;
use App\city;
use App\User;
use App\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;







$factory->define(User::class, function (Faker $faker) {
	$country_id = 75;


	$arr_state_ids = App\State::where('country_id', $country_id)->pluck('id');
	$state_id = 1210;

	if(count($arr_state_ids) > 1 ){
		$state_id = $arr_state_ids[mt_rand(0, count($arr_state_ids) - 1)];
	}else if(count($arr_city_ids) <= 0 ){
		$state_id = 1210;

	}

	//dd($state_id);

	$arr_city_ids = App\City::where('state_id', $state_id)->pluck('id');
	$city_id = 17219;
	if(count($arr_city_ids) > 1 ){
		$city_id = $arr_city_ids[mt_rand(0, count($arr_city_ids) - 1)];
		$locations = App\City::where('state_id', $state_id)->get();
		$user_location = $locations[mt_rand(0, count($locations) -1 )]->name;
	}else if(count($arr_city_ids) <= 0 ){
		$city_id = 17219;
		//$city = App\City::find(17219)->name;

        //$city = $city->name;
		$user_location = App\City::find(17219)->name;
	}else{
		$user_location = App\City::find(17219)->name;
	}


	$avatar = 'frontAssets/images/avatars/default.jpg';

	//$avatar = $faker->image(storage_path() . '/public/storage/images/avatars/',400, 300);

	// $arr_user_role = [
	// 	'user',
	// 	'vendor'
	// ];

	$user_role = 'vendor';

	$arr_user_type = [
		'photographer',
		'videographer',
		'dj',
		'photo-video-stand',
		'caterer',
		'performers',
		'workshop-private-course',
		'equipment-rental',
		'ephemeral-stand-show',
		'company-animation',
		'excursions',
		'booth-culinary-show'
	];

	



	

	if($user_role == 'user'){
		$user_type = 'user';
	}else{
		$user_type = $arr_user_type[rand(0, 11)];
	}




	

	

	return [
		'name' => $faker->name,
		'avatar' => $avatar,
		'user_role' => $user_role,
		'user_type' => $user_type,
		'user_location' => $user_location,
		'country_id' => $country_id,
		'state_id' => $state_id,
		'rate' => mt_rand(40, 100),
		'city_id' => $city_id,
		'description' => $faker->paragraph,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
        'password' => Hash::make('password'), // password
        'remember_token' => Str::random(50),
        'freezed_dates' => '0000-00-00,0000-00-01'
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
	$roles = Role::where('name', '!=', 'admin')->get();
	$user->roles()->sync($roles->pluck('id')->toArray());

	$rating = new willvincent\Rateable\Rating;
	$rating->rating = mt_rand(1, 5);
	$rating->user_id = $user->id;	

	$user->ratings()->save($rating);
});
