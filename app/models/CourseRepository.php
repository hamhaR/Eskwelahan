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
                    ->join('section_course', 'section_course.course_id', '=', 'courses.id')
                    ->where('teacher_id', '=', $t_id)
                    ->select('courses.id', 'courses.course_code', 'section_course.section_id', 'courses.course_title', 'courses.course_description')
                    ->get();

        $array = [];
        foreach($rows as $row){
            $row = get_object_vars($row);
            $course_id = $row['id'];
            $course_code = $row['course_code'];
            $section_id = $row['section_id'];
            $course_title = $row['course_title'];
            $course_description = $row['course_description'];
            
            $result = [
                'id' => $course_id,
                'course_code' => $course_code,
                'sec_name' => $section_id,
                'course_title' => $course_title,
                'course_description' => $course_description
            ];

            array_push($array, $result);
        }

        return $array;      
 	}

    public function add($attributes, $c_section) {
        //$this->checkWritePermissions;
        $req = [
            'course_code' => 'required',
            'course_title' => 'required',
            'course_description' => 'required'
        ];

        $validator = Validator::make($attributes, $req);
        if ($validator->passes()) {
            
            // find course_code if exist in course table
            $findCourseCode = Course::where('course_code', '=', $attributes['course_code'])->get();
            $store = [];
            $c_only = [];
            foreach ($findCourseCode as $t) {
                $result = [
                    'id' => $t->id
                ];
                array_push($store, $result);
                array_push($c_only, $t->course_code);
            }
            if(in_array($attributes['course_code'], $c_only)){
                $c_id = $store[0]['id'];
                
                $find = DB::table('section_course')->where('course_id', '=', $c_id)->get();
                $arr = [];
                $sectionName_only = [];
                foreach ($find as $f) {
                    $s_id = $f->section_id;
                    //array_push($id, $s_id);
                    $findSecName = Section::where('section_id', '=', $s_id)->get();
                    foreach ($findSecName as $g) {
                        $section_name = $g['section_name'];
                        $result = [
                            'section_id' => $s_id,
                            'section_name' => $section_name
                        ];
                        array_push($arr, $result);
                        array_push($sectionName_only, $g->section_name);
                    }
                }

                if (in_array($c_section, $sectionName_only)) {
                    return print 'Error. Section already exist!';
                } else{
                    // insert new section
                    $section = new Section;
                    $section->section_name = $c_section;
                    $section->teacher_id = Auth::id();
                    $section->save();

                    $r = new SectionCourse;
                    $r->section_id = $section->section_id;
                    $r->course_id = $c_id;
                    $r->save();

                    return $c_id;
                }
                
            } else{
                // insert course to course table
                $course = new Course;
                $course->course_code = $attributes['course_code'];
                $course->course_title = $attributes['course_title'];
                $course->course_description = $attributes['course_description'];
                $course->save();

                $c_id = $course->id;        // course id

                // insert section name to section table
                $section = new Section;
                $section->section_name = $c_section;
                $section->teacher_id = Auth::id();
                $section->save();
    
                $r = new SectionCourse;
                $r->section_id = $section->section_id;
                $r->course_id = $c_id;
                $r->save();

                // insert teacher id to teacher_course table
                $t_c = new TeacherCourse;
                $t_c->teacher_id = Auth::id();
                $t_c->course_id = $c_id;
                $t_c->save();
                
                return $course->id;
            }
        } else {
            return print 'Invalid data.';
        }
    }

    public function delete($id) {
        //$this->checkWritePermissions;
        $course = Course::find($id);
        if ($course != null) {
            $a = DB::table('section_course')->where('course_id', $id)->get();
            $d = [];
            foreach ($a as $b) {
                array_push($d, $b->section_id);
            }
            $section_id = $d[0];

            DB::table('section_course')->where('course_id', $id)->delete();
            $section = Section::find($section_id)->delete();

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