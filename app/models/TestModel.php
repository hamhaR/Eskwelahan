<?php

class TestModel implements TableRepository{
	
	public function checkTeacher() {
        if (Auth::user()->role != 'teacher') {
            throw new UnauthorizedException('Access is denied!');
        }
    }

    public function checkPermissions($id) {
       $user = Auth::user();
        if ($user->role != 'teacher' && $user->id != $id) {
            throw new UnauthorizedException('Access is denied!');
        }
    }

     public function add($attributes) {
         $this->checkTeacher();
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
         $this->checkTeacher();
        return User::orderBy('username')->get($columns);
    }

    public function delete($id) {
        $this->checkTeacher();
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
        } else {
            throw new ErrorException("Invalid userId!");
        }
    }

    public function edit($id, $attributes) {
        //wala pa.
    }

    public function find($id) {
        $user = User::find($id);
        if($user == null){
            return null;
        }
        return $user->attributesToArray();
    }
}