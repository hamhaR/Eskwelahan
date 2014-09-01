<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Answer extends Eloquent{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function testQuestion(){
        return $this->belongsTo('Question','question_id', 'id');
    }
}
