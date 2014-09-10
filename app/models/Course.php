<?php

class Course extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'courses';
	protected $primaryKey = 'id';
	public $timestamps = true;

	
	public function sections(){
		return $this->belongsToMany('Section','section_course','course_id','section_id')->withTimestamps();
	}

	public function teacher(){
		return $this->belongsTo('User', 'teacher_id', 'id');
	}

	public function test(){
		return $this->hasOne('Test', 'test_id', 'id');
	}
}