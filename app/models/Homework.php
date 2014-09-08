<?php

class Homework extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homeworks';
        
    protected $fillable = array('homework_instruction', 'course_id');
    /**
	 * Set whether soft deletion is enabled or not.
	 *
	 * @var boolean
	 */
    protected $softDelete = true;

        
}