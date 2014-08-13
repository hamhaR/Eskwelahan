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

    public function all(array $columns = ["*"]) {
       //
    }

    public function delete($id) {
        //
    }

    public function edit($id, $attributes) {
        //
    }

    public function find($id) {
        //
    }
}