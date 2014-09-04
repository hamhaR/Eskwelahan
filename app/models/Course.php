<?php

class Course extends Eloquent{
	use SoftDeletingTrait;

	protected $table = 'courses';
	protected $primaryKey = 'id';
	public $timestamps = true;

	
}