<?php

class StudentTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $students = [
            [
                'student_id' => 1,
                'course_id' => 1
            ]
        ];
            DB::table('student')->insert($students);
	}
}
