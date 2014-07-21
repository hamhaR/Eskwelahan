<?php

class FriendTableSeeder extends DatabaseSeeder {
	public function run() {
		$friends = [
			[
				'user_id' => 1,
				'f_id' => 2,
				'created_at' => new DateTime,
    			'updated_at' => new DateTime
			]
		];
		
		DB::table('friends')->insert($friends);
	}
}