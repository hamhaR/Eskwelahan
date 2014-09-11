<?php

class HomeworkModel implements TableRepository
{
	public function checkTeacher() 
	{
        if (Auth::user()->role != 'teacher') 
        {
            throw new UnauthorizedException('Access is denied!');
        }
    }

    public function checkPermissions($id) 
    {
        $user = Auth::user();
        if ($user->role != 'teacher' && $user->id != $id) 
        {
            throw new UnauthorizedException('Access is denied!');
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

    public function all(array $columns = ["*"]) 
    {
       //
    }

    public function delete($id) {
        //
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
                if ((gettype($h_instruction) == 'string') && (gettype($h_title) == 'string')) 
                {
                    $homework->homework_instruction = $attributes['homework_instruction'];
                    $homework->homework_title = $attributes['homework_title'];
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