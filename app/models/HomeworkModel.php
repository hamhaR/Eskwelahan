<?php

class HomeworkModel
{
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

    public function add($attributes) 
    {
        $this->checkWritePermissions();
        $rules = [
        'homework_instruction' => 'required',
        'homework_title' => 'required',
        'section_course_id' => 'required',
        'deadline' => 'date'
        ];

        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) 
        {
            $userId = Homework::create($attributes)->id;
            return $userId;
        } 
        else 
        {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all() 
    {
        $role = Auth::user()->role;

     if ($role == 'teacher') 
     {
         $homeworks = DB::select('SELECT homeworks.id, homeworks.homework_title, sections.teacher_id, courses.course_code, homeworks.created_at FROM homeworks INNER JOIN section_course ON (section_course.section_course_id = homeworks.section_course_id) INNER JOIN sections ON (sections.section_id = section_course.section_id) INNER JOIN courses ON (section_course.course_id = courses.id) WHERE sections.teacher_id = ? AND homeworks.deleted_at IS NULL ORDER BY homeworks.id', array(Auth::user()->id));
     }
     if ($role == 'student') 
     {
         $homeworks = DB::select('SELECT homeworks.id, homeworks.homework_title, courses.course_code, homeworks.created_at FROM homeworks INNER JOIN section_course ON (section_course.section_course_id = homeworks.section_course_id) INNER JOIN sections ON (sections.section_id = section_course.section_id) INNER JOIN courses ON (section_course.course_id = courses.id) INNER JOIN section_students ON (sections.section_id = section_students.section_id) WHERE section_students.student_id = ? AND homeworks.deleted_at IS NULL ORDER BY homeworks.id', array(Auth::user()->id));
     }
     if ($role == 'admin')
     {
     	$homeworks = DB::select('SELECT homeworks.id, homeworks.homework_title, courses.course_code, homeworks.created_at, users.lname, users.fname FROM homeworks INNER JOIN courses ON (homeworks.course_id = courses.id) INNER JOIN users ON (homeworks.teacher_id = users.id) AND homeworks.deleted_at IS NULL ORDER BY homeworks.id');
     }
     if (!Auth::check())
     {
        throw new ErrorException("Access is denied!");
    }

    if (Auth::check()) 
    {
     $array = [];
     foreach($homeworks as $row){
        $row = get_object_vars($row);
        $homework_id = $row['id'];
        $homework_title = $row['homework_title'];
        $course_code = $row['course_code'];
        $created_at = $row['created_at'];

        if ($role == 'admin')
        {
        	$lname = $row['lname'];
        	$fname = $row['fname'];
        	
        	$result = [
        	'id' => $homework_id,
        	'homework_title' => $homework_title,
        	'course_code' => $course_code,
        	'lname' => $lname,
        	'fname' => $fname,
        	'created_at' => $created_at
        	];
        }
        else 
        {
        	$result = [
        	'id' => $homework_id,
        	'homework_title' => $homework_title,
        	'course_code' => $course_code,
        	'created_at' => $created_at
        	];
        }
        

        array_push($array, $result);
    }

    return $array;     
}
}

public function delete($id) 
{
    $homework = Homework::find($id);
    if ($homework != null) {
        DB::table('homeworks')->where('id', $id)->delete();
        $homework->delete();
    } else {
        throw new Exception("Invalid homework.");
    }
}

public function edit($id, $attributes) 
{
	$this->checkWritePermissions();
    $homework = Homework::find($id);

    if($id == null) 
    {
        throw new Exception("Invalid homework.");
    } 
    else 
    {
        if(array_key_exists('homework_instruction', $attributes) && array_key_exists('homework_title', $attributes)) 
        {
            $h_instruction = $attributes['homework_instruction'];
            $h_title = $attributes['homework_title'];
            $c_id = $attributes['section_course_id'];
            if ((gettype($h_instruction) == 'string') && (gettype($h_title) == 'string')) 
            {
                $homework->homework_instruction = $attributes['homework_instruction'];
                $homework->homework_title = $attributes['homework_title'];
                $homework->section_course_id = $attributes['section_course_id'];
                $homework->deadline = $attributes['deadline'];
            } 
            else 
            {
                throw new Exception("Invalid homework information.");
            }
        }
    }
}

public function find($homework_id) 
{
    $homework = Homework::find($homework_id);
    if ($homework == null) 
    {
        throw new Exception("Homework not found.");
    }
    elseif($homework['deleted_at'] == null) 
    {
        $attributes = $homework->attributesToArray();
        return $attributes;
    }
}
}