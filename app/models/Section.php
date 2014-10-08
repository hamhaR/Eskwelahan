<?php

class Section extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'sections';
	protected $primaryKey = 'section_id';
	public $timestamps = true;

	protected $fillable = array('section_name','course_id', 'teacher_id');

	public function students(){
		return $this->belongsToMany('User','section_students','section_id','student_id')->withTimestamps();
	}

	public function courses(){
		return $this->belongsToMany('Course','section_course' ,'section_id','course_id')->withTimestamps();
	}

	public function teacher(){
		return $this->belongsTo('User')->where('role','=','teacher');
	}

	public function tests(){
		return $this->hasMany('Test', 'test_id');
	}

	public function questions(){
		return $this->hasMany('Question', 'question_id');
	}
}