<?php

class CourseTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $course = [
            [
                'course_code' => 'CSC188',
                'course_title' => 'Software Project Management',
                'course_description' => 'a software project management course',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('courses')->insert($course);
	}
}
