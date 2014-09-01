<?php

class TestModel implements TableRepository{
	
	 protected static $writePermissions = [
        'admin' => false,
        'student' => false,
        'teacher' => true,
        null => false
    ];
    
    protected static $readPermissions = [
        'admin' => false,
        'student' => true,
        'teacher' => true,
        null => false
    ];

    public function checkWritePermissions() {
        $role = Auth::user()->role;
        if (self::$writePermissions[$role] != true) {
            throw new UnauthorizedException('Access is denied!');
        }
    }
    
    public function checkReadPermissions() {
        $role = Auth::user()->role;
        if (self::$readPermissions[$role] != true) {
            throw new UnauthorizedException('Read access is denied!');
        }
    }

    public function add($attributes) {
        $this->checkWritePermissions();
        $rules = [ 
            'test_name'    => 'required|Unique',
            'teacher_id'   => 'required',
            'course_id'  => 'required'
            ];
        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) {
            $test = new Test;
            $test->test_name = $attributes['test_name'];
            $test->teacher_id = $attributes['teacher_id'];
            $test->course_id = $attributes['course_id'];
            $test->save();
            return $test->id;
        } else {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"]) {
         $this->checkReadPermissions();
        return Test::orderBy('id')->get($columns);
    }

    public function delete($id) {
        //
    }

    public function edit($id, $attributes) {
        //wala pa.
    }

    public function find($id) {
        $test = Test::find($id);
        if($test == null){
            return null;
        }
        return $test->attributesToArray();
    }
}