<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use Carbon\Carbon;
use App\ChatConversation;
class ChatMessage extends Model
{
	//protected $with = ['recievers','senders'];

	protected $appends = ['chat_time','chat_date','full_date_time'];
	//protected $with =['messaging'];

	public function getChatTimeAttribute(){
		return Carbon::parse($this->attributes['created_at'])->format('h:i A');
	}	


	public function getChatDateAttribute(){
		return Carbon::parse($this->attributes['created_at'])->format('d-M-Y');
	}	

	public function recievers(){
		return $this->belongsTo(User::class,'receiver','id');
	}
	
	public function messaging(){
		return $this->hasOne(ChatConversation::class,'chat_id','chat_id')->orderBy('id','desc');
	}


	public function getFullDateTimeAttribute(){
		return Carbon::parse($this->attributes['created_at'])->format('d-M-Y / h:i A');
	}


	public function senders(){
		return $this->belongsTo(User::class,'sender','id');
	}
}
