<?php

class QuestionModel implements TableRepository{
	
	 protected static $writePermissions = [
        'admin' => false,
        'student' => true,
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
        //$this->checkWritePermissions();
        $rules = [ 
            'content'           => 'required',
            'a'                 => 'required',
            'b'                 => 'required',
            'c'                 => 'required',
            'd'                 => 'required',
            'correct_answer'    => 'required',
            'test_id'           => ''
            ];
        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) {
            $question = new Question;
            $question->content = $attributes['content'];
            $question->a = $attributes['a'];
            $question->b = $attributes['b'];
            $question->c = $attributes['c'];
            $question->d = $attributes['d'];
            $question->correct_answer = $attributes['correct_answer'];
            $question->test_id = $attributes['test_id'];
            $question->save();
            return $question->id;
        } else {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"]) {
         $this->checkReadPermissions();
       // return Test::orderBy('id')->get($columns);
          $t_id = Auth::id();   //teacher id

         $rows = DB::table('questions')
                    ->join('tests')
                    ->where('tests.id', '=', 'questions.test_id')
                    ->select( 'tests.test_name',  'questions.content', 'questions.a', 'questions.b', 'questions.c', 'questions.d', 'questions.correct_answer')
                    ->get();

        $array = [];

        foreach($rows as $question){
            $question = get_object_vars($question);
            $test_name = $question['test_name'];
            $content = $question['content'];
            $a = $question['a'];
            $b = $question['b'];
            $c = $question['c'];
            $d = $question['d'];
            $correct_answer = $question['correct_answer'];      
           
            
            $result = [
                'test_name'         => $test_name,
                'content'           => $content,
                'a'                 => $a,
                'b'                 => $b,
                'c'                 => $c,
                'd'                 => $d,
                'correct_answer'    => $correct_answer
                
            ];

            array_push($array, $result);
        }

        return $array;    
    }

    public function delete($id) {
        $this->checkWritePermissions();
        $question = Question::find($id);
        if ($question != null) {
            $result = Question::find($id)->delete();
        } 
        else {
            throw new ErrorException("Invalid id!");
        }

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