<?php

class CourseTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $courses = [
            [
                'course_code' => 'CSC188',
                'course_title' => 'Software Project Management',
                'course_description' => 'Project Eskwelahan',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('course')->insert($courses);
	}
}
