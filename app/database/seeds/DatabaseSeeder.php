<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('FriendTableSeeder');
		$this->call('CourseTableSeeder');
		$this->call('TeacherTableSeeder');
		$this->call('StudentTableSeeder');
	}

}

