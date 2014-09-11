<?php

class SectionCourse extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'section_course';
	protected $primaryKey = 'section_course_id';
	public $timestamps = true;
}