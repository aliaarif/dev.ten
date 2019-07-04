<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\User;
use DB;
use Session; 
use Auth;
use willvincent\Rateable\Rating;

class SearchController extends Controller
{

	public function getUserTypes(Request $request)
	{

		$uT = [];
		// $j=[];

		$userTypes = User::select('user_type', DB::raw('count(*) as total'))->where("user_type","LIKE","%{$request->input('query')}%")->where('user_role', '!=', 'Admin')->where('user_role', '!=', 'User')->groupBy('user_type')->get(['total', 'user_type']);

		//return $userTypes;

		// $userTypes = User::where("user_type","LIKE","%{$request->input('query')}%")->where('user_role', '!=', 'Admin')->where('user_role', '!=', 'User')->groupBy('user_type')->pluck('user_type');


		foreach ($userTypes as $key => $value) {


			$user_type = ucwords(str_replace('-', ' ', $value['user_type']));

			$uT[]=$user_type.'-'.$value['total']; 

			//array_push($uT, $v);   



		}

		//return $uT;
		//return $uT;
		
		return response()->json($uT);
	}


	public function getUserLocations(Request $request)
	{

		$states = State::where('country_id', 75)->pluck('id');

		$cities = City::select("name")->whereIn('state_id', $states)->where("name","LIKE","%{$request->input('query')}%")->get();


		return response()->json($cities);

	}



	public function makeSlug($url){       
		$url = strtolower($url);   
		$url = strip_tags($url);  
		$url = stripslashes($url);  
		$url = html_entity_decode($url);
		$url = str_replace('\'', '', $url);    
		$match = '/[^a-z0-9]+/';    $replace = '-';    
		$url = preg_replace($match, $replace, $url); 
		$url = trim($url, '-');   
		return $url;
	}


	public function search(Request $request){
		$type = $this->makeSlug($request->user_type);
		$location =  $this->makeSlug($request->user_location);
		return redirect()->route('get.search.result', ['type' => $type, 'location' => $location ]);

	}



	public function getSearchResults($type = null, $location = null){




		if($type == null && $location == null){
			$results = User::where('user_role', 'vendor')->where('id', '!=', Auth::id())->orderBy('rate', 'asc')->paginate(12);

			$data = [
				'pageTitle' => 'Services panel',
				'searchResults' => $results
			];		

		}else{

			if(strpos($type,'-')!==false){
				$t=explode('-', $type);
				$type=$t[0];  
			}
			

			if($location != null){
				$results = User::where('user_type', $type)->where('user_location', 'LIKE', "%{$location}%")->where('user_role', 'vendor')->where('id', '!=', Auth::id())->orderBy('rate', 'asc')->paginate(12);
			}else{


				$results = User::where('user_type', 'LIKE', "%{$type}%")->where('user_role', 'vendor')->where('id', '!=', Auth::id())->orderBy('rate', 'asc')->paginate(12);
			}


			$data = [
				'pageTitle' =>'Search results of '.$type,
				'searchResults' => $results
			];
		}



		return view('frontend.search', $data);

	}


	public function showProfile($token){
		if(Session::has('token') && Session::has('booking_from_date') && Session::has('booking_to_date')){
			session()->forget(['token', 'booking_from_date', 'booking_to_date']);
		}

		//$vendor = User::where('remember_token', $token)->first();

		$vendor = User::where('remember_token', $token)->first();

		//dd($vendor);
		
		

		$data = [
			'pageTitle' => 'Book '.$vendor->name,
			'vendor' => $vendor
		];

		return view('frontend.booking', $data);
	}


	public function showOtherProfile($token)
	{
		$otherProfile = User::where('remember_token', $token)->first();

		$data = [
			'pageTitle' => 'Show Profile',
			'otherProfile' => $otherProfile
		];
		return view('frontend.profile.others', $data);	


	}

	public function showReviews($token){
		$vendor = User::where('remember_token', $token)->first();
		$reviews = Rating::where('rateable_id', $vendor->id)->get();
		$data = [
			'pageTitle' => 'Reviews of '.$vendor->name,
			'vendor' => $vendor,
			'reviews' => $reviews
		];

		return view('frontend.reviews', $data);
	}
	
	
	










}