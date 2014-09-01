<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Test extends Eloquent{
    protected $table = 'tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function teacherCourses(){
        return $this->belongsTo('TeacherCourse','teacherCourse_id');
    }
}
