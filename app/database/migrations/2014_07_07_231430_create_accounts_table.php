<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string ('first_name', 255);
			$table->string ('last_name', 255);
			$table->string('username', 32)->unique();
            $table->string('password', 64);
			
            $table->string('email', 255)->unique();
			$table->string('address', 255);
			$table->date('birthday');
			
			$table->enum('role', array('student', 'teacher'))->default('student');
			$table->enum('role', array('male', 'female'))->default('gender');
            $table->timestamps();
            $table->softDeletes();
			//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
