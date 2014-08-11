<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Homework extends Eloquent implements UserInterface, RemindableInterface 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homeworks';
        
        protected $fillable = array('homework_instruction');
        /**
	 * Set whether soft deletion is enabled or not.
	 *
	 * @var boolean
	 */
        protected $softDelete = true;
}