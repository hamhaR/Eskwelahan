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
			$table->string('a');
			$table->string('b');
			$table->string('c');
			$table->string('d');
			$table->char('correct_answer',1);

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