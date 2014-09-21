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
        $this->checkAdmin();
        $rules = [
            'homework_instruction' => 'required',
            'homework_title' => 'required',
            'course_id' => 'required'
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
           # code...
       }
       if ($role == 'student') 
       {
           # code...
       }
    }

    public function delete($id) 
    {
        $homework = Homework::find($id);
        if ($homework != null) {
            DB::table('homeworks')->where('homework_id', $id)->delete();
            $homework->delete();
        } else {
            throw new Exception("Invalid homework.");
        }
    }

    public function edit($id, $attributes) 
    {
        $homework = Homework::find($id);

        if($id == null) 
        {
            throw new Exception("Invalid course code.");
        } 
        else 
        {
            if(array_key_exists('homework_instruction', $attributes) && array_key_exists('homework_title', $attributes)) 
            {
                $h_instruction = $attributes['homework_instruction'];
                $h_title = $attributes['homework_title'];
                $c_id = $attributes['course_id'];
                if ((gettype($h_instruction) == 'string') && (gettype($h_title) == 'string')) 
                {
                    $homework->homework_instruction = $attributes['homework_instruction'];
                    $homework->homework_title = $attributes['homework_title'];
                    $homework->course_id = $attributes['course_id'];
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