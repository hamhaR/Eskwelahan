<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class TestController extends Controller 
{
	private $tests;

	

	public function __construct(TestModel $tests) 
	{
        $this->tests = $tests;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$tests = Test::all();
	
		//return View::make('tests.index')->with('tests', $tests);
		$user = Auth::user();
		if(Auth::check()){
			if($user->role == 'teacher' ) {
				
				$sections = Section::where('teacher_id','=',$user->id)->orderBy('section_id','desc')->paginate(4);
				//$tests 	= Test::where('teacher_id', '=', $user->id)->orderBy('id', 'desc');
				$tests = Test::all();
				$courses = Course::all();

				return View::make('tests.index')->with(array(
					'sections' =>$sections,
					'tests'	=> $tests,
					'courses' => $courses
					));
			}
			if($user->role == 'student' ){
				$sections = $user->sections;
				return View::make('tests.index')->with('sections',$sections);
			}

			if($user->role == 'admin'){
				$sections = Section::orderBy('section_id', 'desc')->paginate(4);
				return View::make('tests.index')->with('sections', $sections);
			}
			
			
		}
		else{
			echo "not logged in";
		}
}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{/*

		$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title 
			-> FROM teacher_courses 
			-> INNER JOIN courses 
			-> ON (teacher_courses.course_id = courses.id) 
			-> WHERE teacher_id = ?', array(Auth::user()->id));

		return View::make('tests.create')->with('courses', $results); */
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $testData = [
			'test_name' => Input::get('test_name'),
            'test_instructions' => Input::get('test_instructions'),
			'time_start' => Input::get('time_start'),
			'time_end' => Input::get('time_end'),
            'section_id' => Input::get('section_id')
        ];
        $rules = array(
            'test_name' => 'required',
			'test_instructions' => '',
			'time_start' => 'required',
            'time_end' => 'required',
			'section_id' => ''
        );
        $validator = Validator::make($testData, $rules);
		try{
			if ($validator->passes()) {
				$this->tests->add($testData);
				Session::flash('message', 'Test Successfully added!');
				return Redirect::route('tests.index');
			}
		}
		catch(\Exception $e){
			return Redirect::to('tests.index' );
			//echo 'Error!! Invalid input!';
			//Session::flash('message', 'Error!!');
			return Redirect::to('tests/'. 'add');


		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	//$results = DB::select('SELECT questions.id, questions.content, questions.choice1, questions.choice2, questions.choice3, questions.choice4, questions.answer, questions.test_id FROM questions INNER JOIN tests ON (questions.test_id = tests.id) WHERE teacher_id = ?', array(Auth::user()->id));
		if(Auth::user()->role == 'teacher'){
			$result = Question::where('test_id' , '=', $id)->get();
			return View::make('tests.show')->with(array(
				'questions'=> $result,
				'test_id' => $id
				));
		}
		else if(Auth::user()->role == 'student'){
			return View::make('tests.testfrontview', [
                    'test' => Test::find($id)
       		 ]);
		}
		else{
			return Redirect::to('tests');
			Session::flash('message', 'Access denied!');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//$testData = $this->tests->find($id);
        //return View::make('tests.edit', $testData);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$testData = [
			'test_name' => Input::get('test_name'),
			'test_instructions' => Input::get('test_instructions'),
			'time_start'	=> Input::get('time_start'),
			'time_end'	=> Input::get('time_end'),

        ];
        $rules = [
			'test_name' => '',
			'test_instructions' => '',
			'time_start'	=> '',
			'time_end'	=> '',

        ];
        $validator = Validator::make($testData, $rules);
		try{
			if ($validator->passes()) {
				$test = Test::find($id);
				$test->test_name = Input::get('test_name');
				$test->test_instructions = Input::get('test_instructions');
				$test->time_start 	=	Input::get('time_start');
				$test->time_end 	=	Input::get('time_end');
				
				$test->save();
				Session::flash('message', 'Successfully edited test!');
				return Redirect::to('tests');
			}
		}
		catch(\Exception $e){
			return Redirect::to('tests/' . $id . '/edit');
			//echo 'Error!! Invalid input!';
			Session::flash('message', 'Error!! Invalid input!');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $test = Test::find($id);
		$test->delete();
		return Redirect::to('tests');
     }

/*Take Test Module**/
    /**
	* Allows students to take test
    */

    public function taketest_store(){
    	$rules = array(
			'test_id' 			=>	'required',
			'student_id'		=> 'required',
			'date_taken'			=> 'required'			
		);

		$taketest = new TakeTest;
		$taketest->test_id			= Input::get('test_id');
		$taketest->student_id	= Input::get('student_id');
		$taketest->date_taken	= Input::get('date_taken');			

		//$test->teacher_id		= Auth::id();
		$taketest->save();

		//Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('tests');
    }

   	public function taketest($id){

    	$questions = Question::where('test_id', '=', $id)->get();

    	$time = Test::find($id);
    	$date_taken = DB::table('take_tests')->where('test_id', '=', $id)->get();

    	if(empty($date_taken)){
    		$taketest = new TakeTest;
    		$taketest->test_id = $id;
    		$taketest->student_id = Auth::id();
    		$taketest->date_taken = new DateTime;
    		$taketest->save();
    		$t_id = $taketest->id;

    		$date = TakeTest::find($t_id);
    		$time = Test::find($id);
    		if (($date->date_taken < $time->time_end) and (($date->date_taken >= $time->time_start) or ($date->date_taken <= $time->time_start)) ) {
    			return View::make('tests.taketest')-> with('questions', $questions);
    		} else{
    			Session::flash('message', 'Access denied! Time has already passed! Bleeeh. :P');
    			return Redirect::to('tests');
    		}
    		return 'Didnt satisfy condition';
    	}else{ 
			// $date is not null

    		$store = [];
    		foreach ($date_taken as $key2 => $value2) {
    			array_push($store, $value2->student_id);
    		}

    		foreach ($date_taken as $key => $value) {
    			if (in_array(Auth::id(), $store)) {
    				if (($value->date_taken < $time->time_end) and (($value->date_taken >= $time->time_start) or ($value->date_taken <= $time->time_start))) {
    					return View::make('tests.taketest')-> with('questions', $questions);
    				} else{
    					Session::flash('message', 'Youre late! Time for taking this exam is over.');
    					return Redirect::to('tests');
    				}
    			} else{
    				if (($value->date_taken < $time->time_end) and (($value->date_taken >= $time->time_start) or ($value->date_taken <= $time->time_start))) {
    					$taketest = new TakeTest;
    					$taketest->test_id = $id;
    					$taketest->student_id = Auth::id();
    					$taketest->date_taken = new DateTime;
    					$taketest->save();
    					return View::make('tests.taketest')-> with('questions', $questions);
    				} else{
    					Session::flash('message', 'Youre late! Time for taking this exam is over.');
    					return Redirect::to('tests');
    				}
    			}
    		}

    	}
    	

    }

	public function testfrontview($id){
		return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
        ]);
	}

	 public function testanswer_store($id){
	 	$question = TestAnswer::where('question_id', '=', $id);
	 	if($question != null){
    	$rules = array(
			'student_id' 			=>	'',
			'test_id' 				=> '',
			'question_id'			=> '',
			'user_answer'			=> 'required'			
		);

		$testanswer = new TestAnswer;
		
		$testanswer->test_id			= Input::get('test_id');
		$testanswer->question_id		= Input::get('question_id');
		$testanswer->user_answer		= Input::get('user_answer');	
		$testanswer->student_id			= Auth::id();		

		//$test->teacher_id		= Auth::id();
		$testanswer->save();

		//Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('/taketest/{{ $test->id}}');//dili pa ni sure
		}
		else{
			return Redirect::to('tests');
		}
    }


}
