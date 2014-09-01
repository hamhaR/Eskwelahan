<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Test extends Eloquent{
    protected $table = 'tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function teacher_courses(){
        return $this->belongsTo('Teacher','teacher_id');
    }
}
