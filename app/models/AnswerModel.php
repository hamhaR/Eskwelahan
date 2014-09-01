<?php

class AnswerModel implements TableRepository{
	
	 protected static $writePermissions = [
        'admin' => false,
        'student' => false,
        'teacher' => true,
        null => false
    ];
    
    protected static $readPermissions = [
        'admin' => false,
        'student' => false,
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
            'correct_answer'         => 'required|Unique',
            'question_id'            => 'required'
            ];
        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) {
            $answer = new Answer;
            $answer->correct_answer = $attributes['correct_answer'];
            $answer->question_id = $attributes['question_id'];
            $answer->save();
            return $answer->id;
        } else {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"]) {
         $this->checkReadPermissions();
        return Answer::orderBy('id')->get($columns);
    }

    public function delete($id) {
        //
    }

    public function edit($id, $attributes) {
        //wala pa.
    }

    public function find($id) {
        $answer = Answer::find($id);
        if($answer == null){
            return null;
        }
        return $answer->attributesToArray();
    }
}