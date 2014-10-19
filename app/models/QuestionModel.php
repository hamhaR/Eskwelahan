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
        $this->checkWritePermissions();
        $rules = [ 
            'content'           => 'required|Unique',
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
            $question->choice1 = $attributes['a'];
            $question->choice2 = $attributes['b'];
            $question->choice3 = $attributes['c'];
            $question->choice4 = $attributes['d'];
            $question->answer = $attributes['correct_answer'];
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
                    ->select( 'tests.test_name',  'questions.content', 'questions.choice1', 'questions.choice2', 'questions.choice3', 'questions.choice4', 'questions.answer')
                    ->get();

        $array = [];

        foreach($rows as $question){
            $question = get_object_vars($question);
            $test_name = $question['test_name'];
            $content = $question['content'];
            $choice1 = $question['choice1'];
            $choice2 = $question['choice2'];
            $choice3 = $question['choice3'];
            $choice4 = $question['choice4'];
            $answer = $question['answer'];      
           
            
            $result = [
                'test_name' => $test_name,
                'content'   => $content,
                'choice1'   => $choice1,
                'choice2'   => $choice2,
                'choice3'   => $choice3,
                'choice4'   => $choice4,
                'answer'    => $answer
                
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