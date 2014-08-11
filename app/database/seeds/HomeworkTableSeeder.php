<?php

class HomeworkTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $homework = [
            [
            	'homework_description' => 'this is a homework'
            	'homework_deadline' => '2014-08-10 12:00:00',
                'teacher_id' => 3,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('homeworks')->insert($homework);
	}
}
