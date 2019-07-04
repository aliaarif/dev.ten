<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;

use App\UserType;
use Auth; 
use App\User;
use App\Faq;
use App\Message;

use DB; 

class FrontController extends Controller
{

	public function __construct()
	{
		//$this->middleware(['auth', 'verified']);
	}

	// public function getCities()
	// {
	// 	$getStates = DB::table('states')->where('country_id', 75)
	// 	->get()->pluck('id');

	// 	//die($getStates);

	// 	$getCities = DB::table('states')->whereIn('id', $getStates)
	// 	->get()->toArray();

	// 	return $getCities;

	// 	//return request()->json(200, $getCities);
//}


	public function getCities($state_id){
		$cities = City::where('state_id', $state_id)->get(['id', 'name']);
		$data = [
			'cities' => $cities
		];

		return view('backend.profile.cities', $data);
	}


	public function getMessages($user_id){
		$vendor = User::find($user_id);
		$messages = Message::where('user_id', $user_id)->where('from', Auth::id())->get();

		$data = [
			'vendor' => $vendor,
			'messages' => $messages
		];

		return view('backend.one-to-one-messages', $data);
	}



	// Route::get('/users/{user}/messages', function ($user) {
	// 	if (!request()->wantsJson()) {
	// 		abort(404);
	// 	}

	// 	$cnId = array($user, Auth::id());
	// 	sort($cnId);
	// 	$chat_id = $cnId[0].'_'.$cnId[1];

	// 	$messages = App\ChatMessage::where('chat_id', $user)->orderBy('created_at','asc')->get()->groupBy(function($item){
	// 		return $item->created_at->format('d-M-y');
	// 	});
	// 	$messages = collect($messages)->put('Today',[ ]);

	// 	return $messages;
	// });

	// Route::post('/users/{user}/messages', function ($user) {
	// 	$r = explode('_', $user);

	// 	$pos = array_search(request('username'), $r);

	// 	unset($r[$pos]);

	// 	$rv = implode(" ", $r);

	// 	$message = App\ChatMessage::forceCreate([
	// 		'receiver' => $rv,
	// 		'sender' => request('username'),
	// 		'message' => request('message'),
	// 		'chat_id' => $user,
	// 	]);

	// 	App\ChatConversation::updateOrCreate(
	// 		['chat_id'=>$user],
	// 		['message'=>request('message')]
	// 	);
	// 	event(new MessageSent($user, $message));
	// 	return $message;
	// });




	public function faq(){
		$faqs = Faq::all();
		$data = [
			'pageTitle' => 'FAQ',
			'faqs' => $faqs
		];
		return view('frontend.faq', $data);
	}


	public function getFaqResults(){
		$faqs = Faq::all();
		$data = [
			'pageTitle' => 'FAQ',
			'faqs' => $faqs
		];
		return view('frontend.faq', $data);
	}

}
