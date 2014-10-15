<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Test extends Eloquent{
    protected $table = 'tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];

     protected $fillable = array('test_name', 'course_id');


   public function teacher(){
    return $this->belongsTo('User', 'teacher_id', 'id');
   }

   public function course(){
    return $this->belongsTo('Course', 'course_id', 'id');
   }

    public function question(){
    	return $this->hasMany('Question', 'id');
    }

  public function section(){
    return $this->belongsTo('Section', 'section_id');
  }

  public function take(){
    return $this->hasMany('TakeTest', 'test_id');
  }

}

