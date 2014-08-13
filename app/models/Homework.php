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
        
        protected $fillable = array('homework_instruction', 'course_id');
        /**
	 * Set whether soft deletion is enabled or not.
	 *
	 * @var boolean
	 */
        protected $softDelete = true;

        /**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}
}