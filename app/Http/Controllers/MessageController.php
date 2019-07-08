<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\User;
use App\ChatMessage;
use App\Channel;
use Redis;
use Auth;
use DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // $users = ChatMessage::where(function($q){
        //     $q->where('receiver', Auth::id())
        //     ->orWhere('sender', Auth::id());
        // })->with('recievers','senders','messaging')->orderBy('created_at','desc')->groupBy('chat_id')->get();



        $users = ChatMessage::where(function($q){
            $q->where('receiver', Auth::id())
            ->orWhere('sender', Auth::id());
        })->with('recievers','senders','messaging')
        ->whereRaw('id IN (select MAX(id) FROM chat_messages GROUP BY chat_id)')
        ->orderBy('created_at','desc')
        ->get();
		//$users = collect($users)->reverse();
		

		$users = ChatMessage::where(function($query) use($id){
            $query->where('user_id', '=', Auth::id())
                  ->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', '=', Auth::id())
                  ->where('user_id', '=', $id);
        })->get();

		//return $chats;
		

        dd($users);
        $pageTitle = 'Chat Messages';
        return view('chatMessages', compact('users','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function readMessages($user){

        if(ChatMessage::where([
            ['chat_id', $user],
            ['m_read', 0],
            ['receiver', Auth::id()]
        ])->update(['m_read' => 1])){
         return 1;   
     }else{
        return 0;
    }


}


public function store(App\Channel $channel)
{
    $message = ChatMessage::forceCreate([
        'channel_id' => $channel->id,
        'author_username' => request('username'),
        'message' => request('message'),
    ]);

    // Dispatch an event. Will be broadcasted over Redis.
    event(new MessageSent($channel->name, $message));

    return $message;
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
