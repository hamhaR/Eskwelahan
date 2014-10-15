<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TakeTest extends Eloquent{
    protected $table = 'take_tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];

  	public function testanswers(){
  		return $this->hasOne('TestAnswer', 'testanswer_id');
  	}

  	public function questions(){
  		return $this->hasMany('Question', 'question_id');
  	}

  	public function tests(){
  		return $this->hasOne('Test', 'test_id');
  	}

  	public function student(){
  		return $this->hasMany('User', 'student_id');
  	}

  	public function course(){
  		return $this->belongsTo('Course', 'course_id');
  	}

  	public function section(){
  		return $this->belongsTo('Section', 'section_id');
  	}

}
