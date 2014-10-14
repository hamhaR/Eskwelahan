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
		Schema::create('messages', function(Blueprint $table){
			$table->increments('id');
			$table->string('message_content');
			$table->DateTime('date_received');
			$table->integer('sender_id');
			$table->foreign('sender_id')->references('id')->on('users');
			$table->integer('receiver_id');
			$table->foreign('receiver_id')->references('id')->on('users');
			$table->TEXT('remember_token', 100)->nullable();

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
		Schema::dropIfExists('messages');
		$table->dropColumn("remember_token");
	}

}
