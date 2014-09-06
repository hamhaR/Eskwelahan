<?php

class Course extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'courses';
	protected $primaryKey = 'id';
	public $timestamps = true;

	public function students(){
		return $this->belongsToMany('User','student_courses','course_id','student_id');
	}
}