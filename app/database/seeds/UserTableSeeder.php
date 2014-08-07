<?php

class UserTableSeeder extends DatabaseSeeder{
	public function run(){
		$users = [
			[
				'username' => 'student1',
				'password' => Hash::make('password1'),
				'role' => 'student',
				'fname' => 'San',
				'mname' => 'Juan',
				'lname' => 'Dela Cruz',
				'gender' => 'male',
				'address' => 'Iligan City',
				'email' => 'sanjuan.delacruz@wailing-mountains.net'
			],
			[
				'username' => '2student',
				'password' => Hash::make('password2'),
				'role' => 'student',
				'fname' => 'Pablo',
				'mname' => 'Tan',
				'lname' => 'Yu',
				'gender' => 'male',
				'address' => 'Bacolod City',
				'email' => 'pablo.yu@seharbinger.au'
			],
			[
				'username' => 'teacher',
				'password' => Hash::make('teacher'),
				'role' => 'teacher',
				'fname' => 'Francesca',
				'mname' => 'Alde',
				'lname' => 'Merced',
				'gender' => 'female',
				'address' => 'Manila City',
				'email' => 'francesca@yahoo.com.au'
			]
		];

		Eloquent::unguard();
		foreach ($users as $user) {
			User::create($user);
		}
	}
}