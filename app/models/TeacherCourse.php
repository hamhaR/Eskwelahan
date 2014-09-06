<?php

class TeacherCourse extends Eloquent {
	use SoftDeletingTrait;

	protected $table = 'teacher_courses';

	public function teacher(){
		return $this->belongsToMany('User', 'teacher_id', 'id');
	}

	public function course(){
		return $this->belongsToMany('Course', 'course_id', 'id');
	}
}