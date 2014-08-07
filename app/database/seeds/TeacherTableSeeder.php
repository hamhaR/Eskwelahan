<?php

class TeacherTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $teachers = [
            [
                'teacher_id' => 5,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            DB::table('teacher_course')->insert($teachers);
	}
}
