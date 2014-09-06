<?php

class CourseSectionTableSeeder extends DatabaseSeeder{
    	public function run()
	{
            $section = [
            [
                'sec_name' => 'CS',
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'sec_name' => 'CS.1',
                'course_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'sec_name' => 'B5-1',
                'course_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ];
            
            DB::table('section')->insert($section);
	}
}
