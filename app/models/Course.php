<?php

class Course extends Eloquent{
	protected $table = 'courses';
	protected $primaryKey = 'id';
	protected $softDelete = true;
}