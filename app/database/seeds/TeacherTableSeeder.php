<?php

class TeacherTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $teachers = [
            [
                'teacher_id' => 3,
                'course_id' => 1
            ]
        ];
            DB::table('teacher')->insert($teachers);
	}
}
