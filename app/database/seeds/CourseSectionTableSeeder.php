<?php

class CourseSectionTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $section = [
            [
                'section_name' => 'CS',
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'section_name' => 'CS.1',
                'course_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'section_name' => 'B5-1',
                'course_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('sections')->insert($section);
	}
}
