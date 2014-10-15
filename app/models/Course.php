<?php

class Course extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'courses';
	protected $primaryKey = 'id';
	public $timestamps = true;

	
	public function sections(){
		return $this->belongsToMany('Section','section_id', 'section_id')->withTimestamps();
	}

	public function teacher(){
		return $this->belongsToMany('User', 'teacher_id', 'id');
	}

	public function test(){
		return $this->hasOne('Test', 'test_id', 'id');
	}

}