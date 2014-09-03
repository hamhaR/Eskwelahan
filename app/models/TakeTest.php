<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TakeTest extends Eloquent{
    protected $table = 'take_tests';
    protected $primaryKey = 'id';
    //protected $softDelete = true;
    use SoftDeletingTrait;
  	protected $dates = ['deleted_at'];

}
