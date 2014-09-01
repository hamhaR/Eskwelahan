<?php

class QuestionModel implements TableRepository{
	
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
            'content'    => 'required|Unique',
            'test_id'   => 'required'
            ];
        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) {
            $question = new Question;
            $question->content = $attributes['content'];
            $question->test_id = $attributes['test_id'];
            $question->save();
            return $question->id;
        } else {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"]) {
         $this->checkReadPermissions();
        return Question::orderBy('id')->get($columns);
    }

    public function delete($id) {
        //
    }

    public function edit($id, $attributes) {
        //wala pa.
    }

    public function find($id) {
        $question = Question::find($id);
        if($question == null){
            return null;
        }
        return $question->attributesToArray();
    }
}