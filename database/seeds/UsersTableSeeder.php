<?php
use Illuminate\Database\Seeder;
use App\User;
use App\VendorType;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
      User::truncate();
      DB::table('role_user')->truncate();
      $country_id = 75;
      $arr_state_ids = App\State::where('country_id', $country_id)->pluck('id');
      $state_id = 1210;
      if(count($arr_state_ids) > 1 ){
        $state_id = $arr_state_ids[mt_rand(0, count($arr_state_ids) - 1)];
    }else if(count($arr_city_ids) <= 0 ){
        $state_id = 1210;
    }
    $arr_city_ids = App\City::where('state_id', $state_id)->pluck('id');
    $city_id = 17219;
    if(count($arr_city_ids) > 1 ){
        $city_id = $arr_city_ids[mt_rand(0, count($arr_city_ids) - 1)];
        $locations = App\City::where('state_id', $state_id)->get();
        $user_location = $locations[mt_rand(0, count($locations) -1 )]->name;
    }else if(count($arr_city_ids) <= 0 ){
        $city_id = 17219;
        $user_location = App\City::find(17219)->name;
    }else{
        $user_location = App\City::find(17219)->name;
    }
    $avatar = 'frontAssets/images/avatars/default.jpg';
    $user_role = 'vendor';
    VendorType::truncate();
    VendorType::create(['name' => 'photographer']);
    VendorType::create(['name' => 'videographer']);
    VendorType::create(['name' => 'dj']);
    VendorType::create(['name' => 'photo-video-stand']);
    VendorType::create(['name' => 'performers']);
    VendorType::create(['name' => 'workshop-private-course']);
    VendorType::create(['name' => 'equipment-rental']);
    VendorType::create(['name' => 'ephemeral-stand-show']);
    VendorType::create(['name' => 'company-animation']);
    VendorType::create(['name' => 'excursions']);
    VendorType::create(['name' => 'booth-culinary-show']);

    

    $adminRole = Role::where('name', 'admin')->first();
    $admin = User::create([
        'name' => 'Admin',
        'avatar' => $avatar,
        'user_role' => 'admin',
        'user_type' => 'admin',
        'user_location' => 'Admin Location',
        'country_id' => $country_id,
        'state_id' => 1299,
        'city_id' => 17962,
        'rate' => mt_rand(40, 100),
        'description' => $faker->paragraph,
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'email_verified_at' => Carbon::now(),
        'remember_token' => Str::random(50),
        'freezed_dates' => '0000-00-00,0000-00-01'
    ]);
    $admin->roles()->attach($adminRole);





    $userRole = Role::where('name', 'user')->first();
    for($i = 1; $i <= 4; $i++){
        $user = User::create([
            'name' => 'User '.$i,
            'avatar' => $avatar,
            'user_role' => 'user',
            'user_type' => 'user',
            'user_location' => $user_location,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'rate' => mt_rand(40, 100),
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'description' => $faker->paragraph,

            'email' => 'user'.$i.'@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(50),
            'freezed_dates' => '0000-00-00,0000-00-01'
        ]);
        $user->roles()->attach($userRole);
        
    }
    factory(App\User::class, 15)->create();
    factory(App\Friend::class, 20)->create();
    factory(App\Chat::class, 20)->create();
}
}
