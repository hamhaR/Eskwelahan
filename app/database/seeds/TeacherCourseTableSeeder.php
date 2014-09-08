<?php

class TeacherCourseTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $teacher_courses = [
            [
                'teacher_id' => 5,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'teacher_id' => 5,
                'course_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'teacher_id' => 4,
                'course_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('teacher_courses')->insert($teacher_courses);
	}
}
