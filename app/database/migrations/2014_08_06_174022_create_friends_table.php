<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friends', function(Blueprint $table) {
            $table->increments('friend_id');
            
            $table->integer('user_id');
            $table->integer('f_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('f_id')->references('user_id')->on('users');

            $table->timestamps();
            $table->softDeletes();

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('friends');
	}

}
