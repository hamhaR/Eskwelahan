<?php

class CourseRepository  {
	
	protected static $writePermissions = [
		'teacher' => true,
		'student' => false
	];

	protected static $readPermissions = [
		'teacher' => true,
		'student' => true,
        null => true
	];

	public function checkWritePermissions() {
        $role = Auth::user()->role;
        if (self::$writePermissions[$role] != true) {
            throw new UnauthorizedException('Access to table repository is denied!');
        }
    }
    
    public function checkReadPermissions() {
        $role = Auth::user()->role;
        if (self::$readPermissions[$role] != true) {
            throw new UnauthorizedException('Read access to table repository is denied!');
        }
    }

 	public function all() {
 		//$this->checkReadPermissions;
        $t_id = Auth::id();

        $rows = DB::table('teacher_courses')
                    ->join('courses', 'courses.id', '=', 'teacher_courses.course_id')
                    ->where('teacher_id', '=', $t_id)
                    ->select('courses.id', 'courses.course_code', 'courses.course_title', 'courses.course_description')
                    ->orderBy('id', 'desc')
                    ->get();

        $array = [];
        foreach($rows as $row){
            $row = get_object_vars($row);
            $course_id = $row['id'];
            $course_code = $row['course_code'];
            $course_title = $row['course_title'];
            $course_description = $row['course_description'];
            
            $result = [
                'id' => $course_id,
                'course_code' => $course_code,
                'course_title' => $course_title,
                'course_description' => $course_description
            ];

            array_push($array, $result);
        }

        return $array;      
 	}

    public function add($attributes) {
        //$this->checkWritePermissions;
        $req = [
            'course_code' => 'required',
            'course_title' => 'required',
            'course_description' => 'required'
        ];

        $validator = Validator::make($attributes, $req);
        if ($validator->passes()) {
            $findCourse = Course::where('course_code', '=', $attributes['course_code'])->get();

            $store = [];
            foreach ($findCourse as $t) {
                $result = [
                    'course_code' => $t->course_code
                ];
                array_push($store, $result);
            }

            if($store == null) {
                $course = new Course;
                $course->course_code = $attributes['course_code'];
                $course->course_title = $attributes['course_title'];
                $course->course_description = $attributes['course_description'];
                $course->save();
                $c_id = $course->id;        // course id

                // insert teacher id to teacher_course table
                $t_c = new TeacherCourse;
                $t_c->teacher_id = Auth::id();
                $t_c->course_id = $c_id;
                $t_c->save();

                return $course->id;
            } else{
                return print 'Invalid data.';
            }
        }
    }

    public function delete($id) {
        //$this->checkWritePermissions;
        $course = Course::find($id);
        if ($course != null) {
            $del = Course::find($id)->delete();
            $del2 = DB::table('teacher_courses')->where('course_id', $id)->delete();
        } else {
            throw new Exception("Invalid course code.");
        }
    }

    public function edit($course_code, $attributes) {
        //$this->checkWritePermissions;
        $course = Course::find($course_code);

        if($course_code == null) {
            throw new Exception("Invalid course code.");
        } else {
            if(array_key_exists('course_definition', $attributes)) {
                $c_definition = $attributes['course_definition'];
                if (gettype($c_definition) == 'string') {
                    $course->course_definition = $attributes['course_definition'];
                } else {
                    throw new Exception("Invalid course definition.");
                }
            }
        }
    }

    public function find($course_code) {
        //$this->checkReadPermissions;
        $course = Course::find($course_code);
        if ($course == null) {
            throw new Exception("Course code doesn't exist.");
        }elseif($course['deleted_at'] == null) {
            $attributes = $course->attributesToArray();
            return $attributes;
        }
    }
}