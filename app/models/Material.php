<?php

class Materials extends Eloquent 
{
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'materials';
        
    protected $fillable = array('material_instruction', 'course_id');
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