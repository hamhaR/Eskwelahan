<?php

class Message extends Eloquent{
	use SoftDeletingTrait;
	protected $table = 'messages';
	protected $primaryKey = 'msg_id';
	public $timestamps = true;

	public function conversation(){
		return $this->belongsTo('Conversation','convo_id');
	}

}