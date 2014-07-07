<?php

class CourseTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $courses = [
            [
                'course_code' => 'CSC188',
                'course_title' => 'Software Project Management'
            ]
        ];
            
            DB::table('course')->insert($courses);
	}
}
