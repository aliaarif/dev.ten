<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\User; 
use App\Message; 
use App\State;
use App\City; 
use willvincent\Rateable\Rating;
use Session;
use Redirect;
use App\Image;
use App\Booking;
use Input;



use App\Http\Requests;
use DB;
use Validator;
use View;

class ProfileController extends Controller
{

	public function __construct()
	{
		//$this->middleware(['auth', 'verified']);
	}


	public function getCities($state_id){
		return City::where('state_id', $state_id)->get(['id', 'name']);
	}


	public function page()
	{
		$myProfile = User::find(Auth::id());

		$data = [
			'pageTitle' => 'Update Profile',
			'myProfile' => $myProfile
		];
		if(Auth::user()->user_role == 'user'){
			return view('frontend.profile.self', $data);	
		}else{
			return view('backend.profile.page', $data);	
		}
		
	}

	public function profile()
	{
		$myProfile = User::find(Auth::id());

		$data = [
			'pageTitle' => 'Update Profile',
			'myProfile' => $myProfile
		];
		if(Auth::user()->user_role == 'user'){
			return view('frontend.profile.self', $data);	
		}else{
			return view('backend.profile.update-profile', $data);	
		}
		
	}


	public function messages()
	{

		$booking = Booking::where('client_id', Auth::id())->groupBy('user_id')->pluck('user_id');
		$vendors = User::whereIn('id', $booking)->get();
		$lastConversation = Message::where('r_id', Auth::id())->whereIn('s_id', $booking)->orderBy('created_at', 'desc')->first();
		$lastConversations = Message::where('r_id', Auth::id())->whereIn('s_id', $booking)->orderBy('created_at', 'desc')->get();
		$s_user = User::find($lastConversation->s_id);
		$data = [
			'pageTitle' => 'Messages',
			'vendors' => $vendors,
			's_user' => $s_user,
			'lastConversations' => $lastConversations
		];

		return view('frontend.profile.messages', $data);	
			
	}



	public function rmessages($s_id)
	{

		$lastConversations = Message::where('r_id', Auth::id())->where('s_id', $s_id)->get();
		$s_user = User::find($s_id);
		$data = [
			'pageTitle' => 'Messages',
			's_user' => $s_user,
			'lastConversations' => $lastConversations
		];

		return view('frontend.profile.rmessages', $data);	
			
	}



	public function invoice()
	{
		$myProfile = User::find(Auth::id());
		$myInvoices = Booking::where('client_id', Auth::id())->get();

		

		$data = [
			'pageTitle' => 'My Invoices',
			'myProfile' => $myProfile,
			'myInvoices' => $myInvoices
		];

		if(Auth::user()->user_role == 'user'){
			return view('frontend.profile.user-invoice', $data);	
		}else{
			return view('backend.profile.vendor-invoice', $data);	
		}
		
	}


	public function updateProfile(Request $request){
		$validation = $request->validate([
			'name' => 'required|max:70',
			'phone' => 'required|max:10',
			'rate' => 'required|max:3',
			//'avatar' => 'required|image|mimes:jpg|max:1024'
		]);

		
		

		if($request->city){
			$state = State::find($request->state);
			$city = City::find($request->city);
			$stateID = $state->id;
			$cityID = $city->id;
			$stateName = $state->name;
			$cityName = $city->name;
		}else{
			$stateID  = 0;
			$cityID = 0;
			$stateName = 'Dummy State';
			$cityName = 'Dummy City';
		}

		$user = Auth::user();
		$user->name = $request->name;
		$user->phone = $request->phone;
		$user->rate = $request->rate + env('MY_VALUE', 5);
		$user->website = $request->website;
		$user->address = $cityName.' ('.$stateName.')';
		$user->user_location = $cityName;
		$user->state_id = $stateID;
		$user->city_id = $cityID;
		$user->user_type = $request->vendor_type;
		$user->description = $request->description;
		//$name = $request->file('avatar')->getClientOriginalExtension();
		//dd($name);
		if($request->has('avatar') && ($request->file('avatar')->getClientOriginalExtension() == 'png' || $request->file('avatar')->getClientOriginalExtension() == 'jpg')){
			//dd($request->avatar->getClientOriginalExtension());
			$imageName = 'frontAssets/images/avatars/'.time().'.'.$request->file('avatar')->getClientOriginalExtension();
			$request->avatar->move(public_path('frontAssets/images/avatars/'), $imageName);
		}else{
			$imageName = Auth::user()->avatar;
			//dd($imageName);
		}
		

		$user->avatar = $imageName;

		$user->save();

		if($user->save()){
			return back()->with('success', "Your profile has been updated!");
		}else{
			return back()->with('error', "Trouble in updating your profile!");
		}
	}


	public function changePassword()
	{
		$myProfile = User::find(Auth::id());

		$data = [
			'pageTitle' => 'Change Password Profile',
			'myProfile' => $myProfile
		];
		if(Auth::user()->user_role == 'user'){
			return view('frontend.profile.change-password', $data);	
		}else{
			return view('backend.profile.change-password', $data);
		}

		
	}


	public function rate(Request $request){

		$my_rating = $request->rating;
		$my_reviews = $request->reviews;
		$vendor = User::find($request->vendor_id);



		if(Rating::where('user_id', Auth::id())->where('rateable_id', $vendor->id)->first()){

			$updateRating = Rating::where('user_id', Auth::id())->where('rateable_id', $vendor->id)->update([
				'rating' => $my_rating,
				'reviews' => $my_reviews
			]);

			if($updateRating){
				return back()->with('success', 'You have successfully update the rating to '.$vendor->name);
			}else{
				return back()->with('error', 'Having some trouble to update the rating of '.$vendor->name);
			}

		}else{
			$rating = new Rating;
			$rating->rating = $my_rating;
			$rating->reviews = $my_reviews;
			$rating->user_id = Auth::id();

			if($vendor->ratings()->save($rating)){
				return back()->with('success', 'You have successfully rated to '.$vendor->name);
			}else{
				return back()->with('error', 'Having some trouble to rate '.$vendor->name);
			}
		}
		



	}


	public function portfolio(){
		$myPortfolio = Image::where('user_id', Auth::id())->orderBy('id', 'desc')->take(6)->get();

		$data = [
			'pageTitle' => 'My Portfolio',
			'images' => $myPortfolio
		];

		return view('backend.profile.portfolio', $data);

	}

	public function portfolioUpload(Request $request)
	{

		$this->validate($request,[
			'images' => 'required',
			'images.*' => 'image|mimes:jpeg,png,jpg|max:1024'
		]);

		$images=[];
		if($files=$request->file('images')){

			foreach($files as $file){
				$ext = $file->getClientOriginalExtension();

				$name = 'frontAssets/images/avatars/'.str_replace(' ', '-', $file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

				if(!file_exists($name)){
					$file->move(public_path('frontAssets/images/avatars/'), $name);
					$images[]=$name;
					DB::table('images')->insert([
						'name' => $name,
						'user_id' => Auth::id()
					]);	
				}

			}
		}
		return redirect()->back()->with('message', 'Successfully Save Your Image file.');
	}




	



	public function availabilities(){
		
		$data = [
			'pageTitle' => 'Availabilities'
		];

		return view('backend.availabilities', $data);

		
	}

	public function manageAvailabilities(Request $r){
		User::where('id', Auth::id())->update([
			'freezed_dates' => $r->dates
		]);
		return 1;
	}

}
