<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('choices', function(Blueprint $table){
			$table->increments('id');
			$table->string('options');

			$table->integer('question_id');
			$table->foreign('question_id')->references('id')->on('questions');
			
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
	Schema::dropIfExists('choices');
	}

}
