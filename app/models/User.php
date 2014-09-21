<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
        protected $fillable = array('username', 'password', 'role');
        /**
	 * Set whether soft deletion is enabled or not.
	 *
	 * @var boolean
	 */
    //updated version of soft deletes in laravel
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

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
	/*added modules para sa Eloquent na authentication driver*/
	public function getRememberToken()
	{
	    return $this->remember_token;
	    //return null;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	    //return null;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	    //return null;
	}

	public function sections(){
		return $this->belongsToMany('Section','section_students','student_id','section_id')->orderBy('section_id','asc')->withTimestamps();
	}

	public function course(){
		return $this->belongsToMany('Course', 'course_id', 'id');
	}

	public function test(){
		return $this->belongsToMany('Test', 'test_id', 'id');
	}


}