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

            $table->string('username', 32)->unique();
            $table->string('password', 64);

            $table->enum('role', array('clerk', 'auditor', 'admin'))->default('clerk');

            $table->string('email', 255)->nullable()->default(null);

            $table->string('firstname', 32)->nullable()->default(null);
            $table->string('middlename', 32)->nullable()->default(null);
            $table->string('lastname', 32)->nullable()->default(null);

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
