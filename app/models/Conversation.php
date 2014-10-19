<?php

class Conversation extends Eloquent{
	use SoftDeletingTrait;
	protected $table = 'conversations';
	protected $primaryKey = 'convo_id';
	public $timestamps = true;

	public function messages(){
		return $this->hasMany('Message','msg_id', 'convo_id');
	}

	public function persons(){
		return $this->belongsToMany('User','convo_persons','convo_id','person_id')->withTimestamps();
	}
}