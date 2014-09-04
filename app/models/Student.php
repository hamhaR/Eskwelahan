<?php

class Student extends Eloquent{

	protected $table = 'users';
	protected $softDelete = true;


	public function courses(){
		return $this->belongsToMany('Course','student_courses','student_id','course_id');
	}

}