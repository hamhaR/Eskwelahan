<?php

class TestTableSeeder extends DatabaseSeeder{
        public function run()
    {
            $test = [
            [
                'test_name' => 'Chapter1 Test',
                'teacher_id' => 3,
                'course_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'time_started' => new DateTime,
                'time_ended' => new DateTime
            ]
        ];
            
            DB::table('tests')->insert($test);
    }
}
