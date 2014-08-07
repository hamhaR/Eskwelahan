<?php

class UserTableSeeder extends DatabaseSeeder{
	public function run(){
		//User::truncate();
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
				'username' => 'juan',
				'password' => Hash::make('tamad'),
				'role' => 'student',
				'fname' => 'Juan',
				'mname' => 'Dili',
				'lname' => 'Tamad',
				'gender' => 'male',
				'address' => 'Iligan City',
				'email' => 'juan.tamad@wailing-mountains.net'
			],

			[
				'username' => 'student2',
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
			],
			[
				'username' => 'samantha',
				'password' => Hash::make('samsam'),
				'role' => 'teacher',
				'fname' => 'Samantha',
				'mname' => 'Sam',
				'lname' => 'Pinto',
				'gender' => 'female',
				'address' => 'Iligan City',
				'email' => 'sam.pinto@wailing-mountains.net'
			],
			[
				'username' => 'admin',
				'password' => Hash::make('F3$kw31@'),
				'role' => 'admin',
				'fname' => 'Sunshine',
				'mname' => 'Encabo',
				'lname' => 'Podiotan',
				'gender' => 'female',
				'address' => 'Iligan City',
				'email' => 'shine.podiotan@wailing-mountains.net'
			],
			[
				'username' => 'admin2',
				'password' => Hash::make('admin2'),
				'role' => 'admin',
				'fname' => 'Rahmah',
				'mname' => 'Caorong',
				'lname' => 'Hadji Abdulmadid',
				'gender' => 'female',
				'address' => 'Iligan City',
				'email' => 'rahmah.hadjiabdulmadid@wailing-mountains.net'
			]
		];

		Eloquent::unguard();
		foreach ($users as $user) {
			User::create($user);
		}
	}
}