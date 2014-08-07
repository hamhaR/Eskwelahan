<?php

class StudentTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $students = [
            [
                'student_id' => 1,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            DB::table('student')->insert($students);
	}
}
