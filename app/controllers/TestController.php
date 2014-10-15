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

			//if($user->role == 'student'){
			//	$tests = Test::all();
			//	$sections = $user->sections()->paginate(4);
			//	return View::make('tests.index')->with('sections',$sections);
			//}


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
		$rules = array(
			'test_name' 			=>	'required',
			'test_instructions'		=> '',
			'section_id'			=> 'required',
			'time_start'			=> 'required',
			'time_end'				=> 'required'
			
		);

		$test = new Test;
		$test->test_name			= Input::get('test_name');
		$test->test_instructions	= Input::get('test_instructions');
		$test->section_id 			= Input::get('section_id');
		$test->time_start			= Input::get('time_start');
		$test->time_end 			= Input::get('time_end');			

		$test->teacher_id		= Auth::id();
		$test->save();

		
		
		Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('tests');
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
                    'test' => $this->tests->find($id)
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
		$testData = $this->tests->find($id);
        return View::make('tests.edit', $testData);
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
			'testDate' => Input::get('testDate')
        ];
        $rules = [
			'test_name' => '',
			'testDate' => ''
        ];
        $validator = Validator::make($testData, $rules);
		try{
			if ($validator->passes()) {
				$test = Test::find($id);
				$test->testDate = Input::get('testDate');
				$test->test_name = Input::get('test_name');
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

   
/*
    public function taketest($id){
    	$data = [
    		'test_id' => $id,
    		'student_id' => Auth::id(),
    		'date_taken' => new DateTime
    	];

    	$rules = array(
			'test_id' 			=>	'required',
			'student_id'		=> 'required',
			'date_taken'			=> 'required'			
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()){
			return 'Error';
		} else{
	    	$taketest = new TakeTest;
	    	$taketest->test_id = $id;
	    	$taketest->student_id = Auth::id();
	    	$taketest->date_taken = new DateTime;
	    	$taketest->save();
	    	$t_id = $taketest->id;

	    	$date_taken = $taketest->date_taken;
	    	$time_start = TakeTest::where('test_id', '=', $id)->get();
	    	return $time_start;
    	}

/*
    	$questions = Question::where('test_id', '=', $id)->get();
    	$date_taken = TakeTest::find($id);
    	$time_start = Test::find($id);
    	$time_end = Test::find($id);

    	if($date_taken != null){
    		if (($date_taken >= $time_start) && ($date_taken <= $time_end)){
    			return View::make('tests.taketest')-> with('questions', $questions);
    		}
    		else{
    			return Redirect::to('tests.index');
    			echo 'Access denied! Time has already passed! Bleeeh. :P ';
    		}
    	}

	}
	*/

	public function taketest($id){
		$questions = Question::where('test_id', '=', $id)->get();
		return View::make('tests.taketest')->with('questions', $questions);
	}

	public function testfrontview($id){
		return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
        ]);
	}

	 public function testanswer_store(){
    	$rules = array(
			'student_id' 			=>	'',
			'question_id'			=> '',
			'user_answer'			=> 'required'			
		);

		$testanswer = new TestAnswer;
		
		$testanswer->question_id		= Input::get('question_id');
		$testanswer->user_answer		= Input::get('user_answer');	
		$testanswer->student_id			= Auth::id();		

		//$test->teacher_id		= Auth::id();
		$testanswer->save();

		//Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('tests.testfrontview');//dili pa ni sure
    }
    /*
    function check_in_range($id)
	{
		$test = Test::find($id);
		if($test != null){
		  // Convert to timestamp
			$date_taken = TakeTest::where('')
		  $test->time_start = strtotime($testtime_start);
		  $time_end = strtotime($time_end);
		  $date_taken = strtotime($date_taken);
		  // Check that user date is between start & end
		  if (($date_taken >= $time_start) && ($date_taken <= $time_end)){
		  	return true;
		  }
		  return false;
		}
	}
	*/


}
