<?php

class FriendTableSeeder extends DatabaseSeeder {
	public function run() {
		$friends = [
			[
				'user_id' => 1,
				'f_id' => 2
			]
		];
		
		DB::table('friends')->insert($friends);
	}
}