<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('questions', function(Blueprint $table){
			$table->increments('id');
			$table->text('content');
			$table->string('choice1');
			$table->string('choice2');
			$table->string('choice3');
			$table->string('choice4');
			$table->string('answer');

			$table->integer('test_id');
			$table->foreign('test_id')->references('id')->on('tests');
			
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
		Schema::dropIfExists('questions');
	}
}