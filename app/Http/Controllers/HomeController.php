<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['welcome',  'about', 'contact', 'professional']);
    }

    public function index()
    {
     $data = [
        'pageTitle' => 'Dashboard'
    ];
    if(Auth::user()->hasAnyRole('user')){
        return view('frontend.welcome', $data);    
    }
    return view('backend.dashboard', $data);
}


public function form()
{
    $data = [
        'pageTitle' => 'Form'
    ];

    return view('backend.form', $data);
}


public function table()
{
    $data = [
        'pageTitle' => 'Table'
    ];

    return view('backend.table', $data);
}

public function welcome()
{
    $data = [
        'pageTitle' => 'Home'
    ];

    return view('frontend.welcome', $data);
}

public function about()
{
    $data = [
        'pageTitle' => 'About Us'
    ];

    return view('frontend.about', $data);
}

public function contact()
{
    $data = [
        'pageTitle' => 'Contact Us'
    ];

    return view('frontend.contact', $data);
}

public function professional()
{
    $data = [
        'pageTitle' => 'Are you professional'
    ];

    return view('frontend.professional', $data);
}



}
