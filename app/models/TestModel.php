<?php

class TestModel implements TableRepository{
	
	public function checkTeacher() {
       //
    }

    public function checkPermissions($id) {
        //
    }

     public function add($attributes) {
             $rules = [ 'username' => 'required|Unique:users',
            'password' => 'required'];

        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) {
            $userData['password'] = Hash::make($attributes['password']);
            $userId = User::create($attributes)->id;
            return $userId;
        } else {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"]) {
        //wala pay sulod
    }

    public function delete($id) {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
        } else {
            throw new ErrorException("Invalid userId!");
        }

    public function edit($id, $attributes) {
       //
    }

    public function find($id) {
        $user = User::find($id);
        if($user == null){
            return null;
        }
        return $user->attributesToArray();
    }
    }


}