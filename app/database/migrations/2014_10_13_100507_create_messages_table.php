<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->integer('convo_id');
			$table->foreign('convo_id')->references('convo_id')->on('conversations');
			
			$table->increments('msg_id');
			$table->string('msg_content');
			
			$table->integer('sender_id');
			$table->foreign('sender_id')->references('id')->on('users');
			
			$table->boolean('unread');
			
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
		Schema::drop('messages');
	}

}
