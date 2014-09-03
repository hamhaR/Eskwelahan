<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Choice extends Eloquent{
    protected $table = 'choices';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];


    public function testQuestion(){
        return $this->belongsTo('Question','question_id', 'id');
    }
}
