<?php

class SectionCourse extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'section_course';
	protected $primaryKey = 'section_course_id';
	public $timestamps = true;

	public function test(){
		return $this->belongsTo('Test', 'test_id');
	}

	public function section(){
		return $this->hasMany('Section', 'section_id');
	}

	public function course(){
		return $this->hasMany('Course', 'course_id');
	}

	public function teacher(){
		return $this->belongsTo('User', 'user_id', 'id');
	}
}	
