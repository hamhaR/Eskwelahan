<?php

class Section extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'section';
	protected $primaryKey = 'id';
	public $timestamps = true;

	public function course(){
		return $this->belongsTo('course_id', 'id', 'courses');
	}
}