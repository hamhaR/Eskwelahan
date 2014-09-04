<?php

class Course extends Eloquent{

	protected $table = 'courses';
	protected $softDelete = true;


	public function students(){
		return $this->belongsToMany('User','student_courses','course_id','student_id');
	}

}