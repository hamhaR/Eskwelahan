<?php

class TeacherCourse extends Eloquent {
	use SoftDeletingTrait;

	protected $table = 'teacher_courses';

	public function teacher(){
		return $this->belongsTo('User', 'teacher_id', 'id');
	}

	public function course(){
		return $this->belongsTo('Course', 'course_id', 'id');
	}
}