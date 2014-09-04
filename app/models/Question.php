<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Question extends Eloquent{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function studentTest(){
        return $this->belongsTo('Test','test_id', 'id');
    }

}
