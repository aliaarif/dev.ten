<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    //
	public function redirect($service)
	{
		return Socialite::driver($service)->redirect();

	}

	public function callback($service)
	{
		//$socialite_user = Socialite::with($service)->user();
		$socialite_user = Socialite::driver($service)->stateless()->user();
		dd($socialite_user->getEmail());

		$newUser = [
			'name' = $socialite_user->name,
			'email' = $socialite_user->email,
			'password' = bcrypt('password')
		];

		return view('backend.dashboard')->withDetails($user)->withService($service);
	}


}