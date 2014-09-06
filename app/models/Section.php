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
		return $this->belongsToMany('Course', 'sections', 'section_id','course_id')->withTimestamps();
	}
}