<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Test extends Eloquent{
    protected $table = 'tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


   public function teacher(){
    return $this->belongsTo('User', 'teacher_id', 'id');
   }

   public function course(){
    return $this->belongsTo('Course', 'course_id', 'id');
   }

    public function testQuestion(){
    	return $this->hasMany('Question', 'question_id', 'id');
    }

}

