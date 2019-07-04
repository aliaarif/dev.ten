<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth; 
class MessageController extends Controller
{
	public function allMessages(){
		
		$data = [
			'pageTitle' => 'Messages',
			
		];

		return view('backend.messages', $data);
	}
}
