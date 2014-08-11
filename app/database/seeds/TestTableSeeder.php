<?php

class TestTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $test = [
            [
                'questions' => 'this is a question',
                'answer_key' => 'this is an answer key',
                'teacher_id' => 3,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('tests')->insert($test);
	}
}
