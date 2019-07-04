<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Socialite;
use App\Role;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\SocialProvider;
use Auth;
use Mail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $data = [
            'pageTitle' => 'Register Panel'
        ];
        return view('auth.register', $data);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_type' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $user = User::create([

            'name' => $data['name'],
            'user_type' => $data['user_type'],
            'user_role' => $data['user_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'freezed_dates' => '0000-00-00,0000-00-01'

        ]);


        $userRole = Role::where('name', $data['user_type'])->first();


    //    Mail::send('messages' ,['user' => $user], function ($m) use ($user) {
    //         $m->from('info@abc.com', 'Your Application');

    //         $m->to($user->email, $user->name)->subject('Your Reminder!');
    //     });


        /* $to_name = 'Noor';
         $to_email = 'nakhan014@gmail.com';
        $data = array('name'=>"Ogbonna Vitalis(name)", "body" => "A test mail");
        Mail::send("emails.mail", $data['name'], function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Test Mail');
         //$message->from('SENDER_EMAIL_ADDRESS','Test Mail');
         });

*/

        
        $user->roles()->attach($userRole);

        return $user;




    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        try{
            //dd(date('Y-m-d H:i:s'));
            $socialUser = Socialite::driver($provider)->user();
        }catch(\Exception $e){
            return redirect()->route('register')->with('error', $e);
        }

        // Check if we have logged provider

        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if(!$socialProvider){

            // Create a new user and provider 
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            //die($user);

            $user->socialProviders()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider
            ]);

            //$adminRole = Role::where('name', 'admin')->first();
            //$vendorRole =  Role::where('name', 'vendor')->first();
            $userRole = Role::where('name', 'user')->first();



            //$admin->roles()->attach($adminRole);
            //$vendor->roles()->attach($vendorRole);
            $user->roles()->attach($userRole);


            
            Auth::login($user);
            return redirect()->route('welcome');

        }else{
            $user = $socialProvider->user;
            Auth::login($user);
            return redirect()->route('welcome');
        }
    }

}
