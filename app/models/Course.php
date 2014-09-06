<?php

class Course extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'courses';
	protected $primaryKey = 'id';
	public $timestamps = true;

	
	public function sections(){
		return $this->belongsToMany('Section','sections','course_id','section_id')->withTimestamps();
	}
}