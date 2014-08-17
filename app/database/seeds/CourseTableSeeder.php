<?php

class CourseTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $course = [
            [
                'course_code' => 'CSC188',
                'course_title' => 'Software Project Management',
                'course_description' => 'a software project management course',
                'course_section' => 'CS',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'course_code' => 'CSC186',
                'course_title' => 'Human Computer Interaction',
                'course_description' => 'a human computer interaction course for cs students',
                'course_section' => 'CS',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'course_code' => 'HIST1',
                'course_title' => 'Philippines History',
                'course_section' => 'B5-1',
                'course_description' => 'the history of the philippines',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('courses')->insert($course);
	}
}
