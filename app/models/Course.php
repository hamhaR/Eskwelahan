<?php

class Course extends Eloquent{
	protected $table = 'course';
	protected $primaryKey = 'id';
	protected $softDelete = true;
}