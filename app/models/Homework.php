<?php

class Homework extends Eloquent 
{
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homeworks';
        
    protected $fillable = array('homework_title','homework_instruction', 'section_course_id', 'deadline');
    /**
	 * Set whether soft deletion is enabled or not.
	 *
	 * @var boolean
	 */
    protected $softDelete = true;

    public function teacher(){
    	return $this->belongsTo('Teacher', 'teacher_id', 'id');
    }

        
}