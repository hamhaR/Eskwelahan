<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TestAnswer extends Eloquent{
    protected $table = 'testanswers';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];

  	public function taketest(){
  		return $this->belongsTo('TakeTest', 'taketest_id');
  	}

  	public function questions(){
  		return $this->belongsTo('Question', 'question_id');
  	}

  	public function tests(){
  		return $this->belongsTo('Test', 'test_id');
  	}

  	public function student(){
  		return $this->belongsTo('User', 'student_id');
  	}

  	public function course(){
  		return $this->belongsTo('Course', 'course_id');
  	}

  	public function section(){
  		return $this->belongsTo('Section', 'section_id');
  	}

    public function questionCountRelation(){
      return $this->hasOne('Test')->selectRaw('test_id, count(*) as count')->groupBy('test_id');
    }

}
