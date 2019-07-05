<?php
Route::get('test', function(){

	// function abc($a){

	// 	return $a + 2;
	// 	return $a;
	// }







});

use App\Events\MessageSent;
//use Mail;

Route::get('sendemail', function () {
	
    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.leads.welcome', $data, function ($message) {

        $message->from('ali.aliaarif@gmail.com', 'Learning Laravel');

        $message->to('ali.aliaarif@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});




// Route::get('test', function(){
// 	class B  {
// 		public $b = 'B';
// 	}
	
// 	class C extends B {

// 		public $c = 'C';
// 	}
	
// 	class A extends C {
// 		public $a = 'A';
// 	}
	
// 	$a = new A;

// 	dd($a);

// });


Route::get('messages', function(){

	return view('chatMessages', [
		'pageTitle' => 'Chat Messages'
	]);
});
// =======================Chat Route========================

Route::get('/users/{user}/messages', function ($user) {
	dd($user);
	if (!request()->wantsJson()) {
		abort(404);
	}

	$cnId = array($user, Auth::id());
	sort($cnId);
	$chat_id = $cnId[0].'_'.$cnId[1];

	//dd($chat_id);

	$messages = App\ChatMessage::where('chat_id', $user)->orderBy('created_at','asc')->get()->groupBy(function($item){
		return $item->created_at->format('d-M-y');
	});
	$messages = collect($messages)->put('Today',[ ]);
	//dd($messages);
	return $messages;
});

Route::post('/users/{user}/messages', function ($user) {
	$r = explode('_', $user);

	$pos = array_search(request('username'), $r);

	unset($r[$pos]);

	$rv = implode(" ", $r);

	$message = App\ChatMessage::forceCreate([
		'receiver' => $rv,
		'sender' => request('username'),
		'message' => request('message'),
		'chat_id' => $user,
	]);

	App\ChatConversation::updateOrCreate(
		['chat_id'=>$user],
		['message'=>request('message')]
	);
	event(new MessageSent($user, $message));
	return $message;
});


Route::post('/read/{user}/messages', 'MessageController@readMessages');


Route::get('/settings/chat-messages', 'MessageController@index')->name('settings.chatMessages');



//Route::get('friends', 'FriendController@index');
Route::get('chats', 'ChatController@index')->name('chats.index');
Route::get('chats/{id}', 'ChatController@show')->name('chats.show');
Route::post('chats/get-chats/{id}', 'ChatController@getChats');
Route::post('chats/send-chat', 'ChatController@sendChat');


Route::get('filter/{type?}/{location?}/{rate}', function($type = null, $location = null, $rate){

	if($type == 'type' && $location == 'location'){
		$searchResults = App\User::where('rate', '<=', $rate)->where('user_role', '!=', 'admin')->where('user_role', '!=', 'user')->orderBy('rate', 'desc')->paginate();
		$data = ['searchResults' => $searchResults];
		header('Access-Control-Allow-Origin: *');
		return view('frontend.search-filter', $data);
	}

	if($type != 'type' && $location == 'location'){
		$searchResults = App\User::where('user_type', $type)->where('rate', '<=', $rate)->where('user_role', 'vendor')->orderBy('rate', 'desc')->paginate();
		$data = ['searchResults' => $searchResults];
		header('Access-Control-Allow-Origin: *');
		return view('frontend.search-filter', $data);
	}

	if($type != 'type' && $location != 'location'){
		$searchResults = App\User::where('user_type', $type)->where('user_location', $location)->where('rate', '<=', $rate)->where('user_role', 'vendor')->orderBy('rate', 'desc')->paginate();
		$data = ['searchResults' => $searchResults];
		header('Access-Control-Allow-Origin: *');
		return view('frontend.search-filter', $data);
	}



});



Route::post('rate', function(Request $request){

	if(Auth::check()){
		$user = App\User::find($request->id);
		$rating = new willvincent\Rateable\Rating;
		$rating->rating = $request->rate;
		$rating->user_id = Auth::id();
		$user->ratings()->save($rating);
		//dd(App\User::find(6)->ratings);
		return back()->with('msg', 'Rating Added Successfully');

	}else{
		return back();
	}


});



Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Auth::routes(['verify' => true]);





Route::get('get/user_types', 'SearchController@getUserTypes')->name('get.user_types');
Route::get('get/user_locations', 'SearchController@getUserLocations')->name('get.user_locations');


Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/form', 'HomeController@form')->name('form');
// Route::get('/table', 'HomeController@table')->name('table');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/professional', 'HomeController@professional')->name('professional');



Route::get('/filter/{type}/{location}/{rate}', 'FrontController@filter')->name('get.filter.results');
Route::get('get-faqs/{search}', 'FrontController@faq')->name('get.filter.results');



Route::post('/services/{type?}/{location?}', 'SearchController@search')->name('find.professionals');
Route::get('/services/{type?}/{location?}', 'SearchController@getSearchResults')->name('get.search.result');

Route::get('/booking/{token}', 'SearchController@showProfile')->name('show.profile');
Route::get('/reviews/{token}', 'SearchController@showReviews')->name('show.reviews')->middleware('verified');
Route::get('/show/profile/{token}', 'SearchController@showOtherProfile')->name('show.other.profile')->middleware('verified');
Route::post('/booking...', 'BookingController@sendMailToAll')->name('send.mail.to.all');


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('users', 'AdminController', ['except' => ['show', 'create', 'store']]);
	Route::get('/add-faq', 'AdminController@showFAQForm');
	Route::post('/add-faq', 'AdminController@addFAQ')->name('add.faq');

	Route::get('/faq/edit/{id}', 'AdminController@ShowEditFAQ')->name('show.edit.faq.form');
	Route::post('/faq/edit', 'AdminController@editFAQ')->name('edit.faq');
	Route::get('/faq/delete/{id}', 'AdminController@deleteFAQ')->name('delete.faq');

	Route::get('/payments', 'AdminController@payments')->name('payments');
});


Route::get('/faq', 'FrontController@faq')->name('faq');

Route::post('/rate', 'ProfileController@rate')->name('rate')->middleware('auth');



Route::middleware(['auth', 'verified'])->name('vendor.')->group(function(){
	//Route::get('/page', 'ProfileController@page')->name('page');

	//Route::get('/profile', 'ProfileController@profile')->name('profile');
	Route::put('/update-profile', 'ProfileController@updateProfile')->name('update.profile');
	//Route::get('/change-password', 'ProfileController@changePassword')->name('change.password');
	//Route::put('/rate', 'ProfileController@rate')->name('rate');

	Route::get('/get-cities/{state_id}', 'FrontController@getCities');

	Route::get('/portfolio', 'ProfileController@portfolio')->name('portfolio');
	Route::post('portfolio', 'ProfileController@portfolioUpload')->name('portfolio.upload');
	Route::get('/portfolio/delete/{id}', 'ProfileController@deletePortfolio')->name('delete.portfolio');

	Route::get('/availabilities', 'ProfileController@availabilities')->name('availabilities');
	Route::post('manage-availabilities', 'ProfileController@manageAvailabilities')->name('manage.availabilities');




});



Route::middleware(['auth', 'verified'])->name('user.')->group(function(){
	Route::get('/profile', 'ProfileController@profile')->name('profile');
	Route::get('/messages', 'ProfileController@messages')->name('messages');
	Route::get('/rmessages/{s_id}', 'ProfileController@rmessages')->name('rmessages');
	Route::get('/invoice', 'ProfileController@invoice')->name('invoice');
	Route::get('/change-password', 'ProfileController@changePassword')->name('change.password');
	//Route::put('/rate', 'ProfileController@rate')->name('rate');

	//Route::get('/messages', 'MessageController@allMessages')->name('messages');
	//Route::post('/messages/send', 'MessageController@sendMessage')->name('message.send');


	//Route::get('/get-messages/{user_id}', 'FrontController@getMessages');
	

});
