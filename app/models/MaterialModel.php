<?php

class MaterialModel
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
        $this->checkAdmin();
        $rules = [
        'material_instruction' => 'required',
        'material_title' => 'required',
        'course_id' => 'required'
        ];

        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) 
        {
            $userId = Materials::create($attributes)->id;
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
         $materials = DB::select('SELECT materials.id, materials.course_id, materials.material_title, courses.course_code, materials.created_at FROM materials INNER JOIN courses ON (materials.course_id = courses.id) WHERE teacher_id = ? AND materials.deleted_at IS NULL ORDER BY materials.id', array(Auth::user()->id));
     }
     if ($role == 'student') 
     {
         $materials = DB::select('SELECT materials.id, materials.material_title, materials.created_at, courses.course_code FROM section_students INNER JOIN section_course ON (section_students.section_id = section_course.section_id) INNER JOIN materials ON (section_course.course_id = materials.course_id) INNER JOIN courses ON (courses.id = materials.course_id) WHERE student_id = ? AND materials.deleted_at IS NULL', array(Auth::user()->id));
     }
     if ($role == 'admin')
     {

     }
     if (!Auth::check())
     {
        throw new ErrorException("Access is denied!");
    }

    if (Auth::check()) 
    {
     $array = [];
     foreach($materials as $row){
        $row = get_object_vars($row);
        $material_id = $row['id'];
        $material_title = $row['material_title'];
        $course_code = $row['course_code'];
        $created_at = $row['created_at'];

        $result = [
        'id' => $material_id,
        'material_title' => $material_title,
        'course_code' => $course_code,
        'created_at' => $created_at
        ];

        array_push($array, $result);
    }

    return $array;     
}
}

public function delete($id) 
{
    $material = Materials::find($id);
    if ($material != null) {
        DB::table('materials')->where('id', $id)->delete();
        $material->delete();
    } else {
        throw new Exception("Invalid material.");
    }
}

public function edit($id, $attributes) 
{
    $material = Materials::find($id);

    if($id == null) 
    {
        throw new Exception("Invalid course code.");
    } 
    else 
    {
        if(array_key_exists('material_instruction', $attributes) && array_key_exists('material_title', $attributes)) 
        {
            $h_instruction = $attributes['material_instruction'];
            $h_title = $attributes['material_title'];
            $c_id = $attributes['course_id'];
            if ((gettype($h_instruction) == 'string') && (gettype($h_title) == 'string')) 
            {
                $material->material_instruction = $attributes['material_instruction'];
                $material->material_title = $attributes['material_title'];
                $material->course_id = $attributes['course_id'];
            } 
            else 
            {
                throw new Exception("Invalid material information.");
            }
        }
    }
}

public function find($material_id) 
{
    $material = Materials::find($material_id);
    if ($material == null) 
    {
        throw new Exception("Material not found.");
    }
    elseif($material['deleted_at'] == null) 
    {
        $attributes = $material->attributesToArray();
        return $attributes;
    }
}
}