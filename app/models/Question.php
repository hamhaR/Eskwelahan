<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Question extends Eloquent{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function test(){
        return $this->belongsTo('Test','test_id', 'id');
    }
    public function teacher(){
		return $this->belongsTo('User', 'user_id', 'id')/*->where('role','=','teacher')*/;
	}

    public function section(){
        return $this->belongsTo('Section', 'section_id');
    }
}
