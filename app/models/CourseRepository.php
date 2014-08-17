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
 		return Course::all();
 	}

    public function add($attributes, $c_section) {
        //$this->checkWritePermissions;
        $req = [
            'course_code' => 'required|alpha_num',
            'course_title' => 'required',
            'course_description' => 'required'
        ];
        
        $validator = Validator::make($attributes, $req);
        if ($validator->passes()) {
            $course = new Course;
            $course->course_code = $attributes['course_code'];
            $course->course_title = $attributes['course_title'];
            $course->course_section = $c_section;
            $course->course_description = $attributes['course_description'];
            $course->created_at = new DateTime;
            $course->updated_at = new DateTime;
            $course->deleted_at = null;
            $course->save();
            return $course->course_code;
        } else {
            return print 'Invalid data.';
        }
    }

    public function delete($course_code) {
        //$this->checkWritePermissions;
        $course = Course::find($course_code);
        if ($course != null) {
            $course->delete();
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
        if ($course_code == null) {
            throw new Exception("Course code doesn't exist.");
        } else {
            $attributes = $course->attributesToArray();
            return $attributes;
        }
    }
}