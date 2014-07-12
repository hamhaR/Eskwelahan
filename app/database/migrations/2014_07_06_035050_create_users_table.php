<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
           $table->increments('id');

			$table->string('username', 32);
			$table->string('password', 64);

			$table->enum('role', array('student', 'teacher'));

			$table->string('fname', 32);
			$table->string('mname', 32);
			$table->string('lname', 32);
			$table->enum('gender', array('male', 'female'));
			$table->string('address', 255);
			$table->string('email', 255);

            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
