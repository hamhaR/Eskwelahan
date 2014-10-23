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

   public function courses(){
    return $this->belongsTo('Course', 'course_id', 'id');
   }

    public function question(){
    	return $this->hasMany('Question',  'id');
    }

  public function section(){
    return $this->belongsTo('Section', 'section_id');
  }

  public function taketests(){
    return $this->hasMany('TakeTest', 'id' );
  }

  public function section_course(){
    return $this->belongsTo('SectionCourse', 'section_course_id');
  }

}

