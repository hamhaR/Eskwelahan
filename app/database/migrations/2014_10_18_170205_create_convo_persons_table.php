<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvoPersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convo_persons', function(Blueprint $table)
		{
			$table->integer('convo_id');
			$table->foreign('convo_id')->references('convo_id')->on('conversations');
			$table->integer('person_id');
			$table->foreign('person_id')->references('id')->on('users');
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
		Schema::table('convo_persons', function(Blueprint $table)
		{
			//
		});
	}

}
