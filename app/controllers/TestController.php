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
				
				$sections = Section::where('teacher_id','=',$user->id)->get();
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
		$attributes = Input::all();
		$testData = [
			'test_name' 		=> 	$attributes['test_name'],
			'test_instructions' => 	$attributes['test_instructions'],
			'time_start'		=> 	$attributes['time_start'],
			'time_end'			=> 	$attributes['time_end'],
			'section_id'		=> 	$attributes['section_id'],
			'teacher_id'		=>	Auth::id()
		];

		$rules = [
			'test_name' 		=> 	'required',
			'test_instructions' => 	'required',
			'time_start'		=> 	'required',
			'time_end' 			=> 	'required',
			'section_id' 		=> 	'',
			'teacher_id'		=>	''
		];

		$validator = Validator::make($testData, $rules);
				
		if ($validator->fails()) {
			if( (Input::get('test_name') == null) || (Input::get('time_start') == null ) || (Input::get('time_end') == null) ) {
					Session::flash('message', 'Error, required field left blank');
					return Redirect::to('tests');
				}
				else{
					Session::flash('message', 'Invalid input!');
					return Redirect::to('tests');
				}
		} 
		else{
			//if tama, ma save si test
				if(Input::get('time_start') <= Input::get('time_end')){ //check if ang time na magstart ang test kay <= sa time mag end
					$test = new Test;
					$test->test_name = Input::get('test_name');
					$test->test_instructions = Input::get('test_instructions');
					$test->time_start 	=	Input::get('time_start');
					$test->time_end 	=	Input::get('time_end');
					$test->section_id 	=	Input::get('section_id');
					$test->teacher_id	=	Auth::id();
					
					$test->save();
					Session::flash('message', 'Successfully added test!');
					return Redirect::to('tests');
				}
				else{
					Session::flash('message', 'Invalid date range!');
					return Redirect::to('tests');
				}
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
		$test = Test::find($id);
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
			'time_end'	=> ''

        ];

        $validator = Validator::make($testData, $rules);
		
			if ($validator->fails()) {
				if( (Input::get('test_name') == null ) || (Input::get('time_start') == null ) || (Input::get('time_end') == null) ) {
					Session::flash('message', 'Error, required field left blank');
					return Redirect::to('tests');
				}
				else{
					Session::flash('message', 'Invalid input!');
					return Redirect::to('tests');
				}
			}
			else{
				//if walay changes
				$original = $test->getOriginal();
				// if((Input::get('test_name') = $original['test_name']) && (Input::get('test_instructions') == $original['test_instructions']) && (Input::get('time_start') == $original['time_start']) && (Input::get('time_end') == $original['time_end']) ){
				// 	Session::flash('message', 'No changes were made.');
				// 	echo 'error';
				// 	//return Redirect::to('tests');
				// }
				// //if tama, ma save si test
				if(Input::get('time_start') <= Input::get('time_end')){
					$test->test_name 			= 	Input::get('test_name');
					$test->test_instructions	= 	Input::get('test_instructions');
					$test->time_start 			=	Input::get('time_start');
					$test->time_end 			=	Input::get('time_end');
					
					$test->save();
					Session::flash('message', 'Successfully edited test!');
					return Redirect::to('tests');

				}
				 //gets all old data sa database, dayon icompare sa updated data
				
				
				else{
					Session::flash('message', 'Invalid date range!');
					return Redirect::to('tests');
				}
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

	public function taketest($id){

		$questions = Question::where('test_id', '=', $id)->get();
		$test = Test::find($id);
		//$temp_test_ = TakeTest::where('test_id','=', $test->id)->get();
		$temp_date = new DateTime;


			if(($temp_date > $test->time_end) ){
				Session::flash('message', 'You can no longer take this test. Time has already passed.' );
				return Redirect::to('tests');
			} 
			else{
				if(count($test->taketests()) != 0){
					Session::flash('message', 'You have aleady taken this test' );
					return Redirect::to('tests');
				}
				else{
					return View::make('tests.taketest')-> with(array(
							'questions'=> $questions,
							'test_id' => $id
							));
				}
			}
	}


public function testfrontview($id){
		return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
        ]);
	}



	public function testanswer_store(){

	 	$answers = Input::get('answers');
	 	$test = Test::where('id','=',Input::get('test_id'))->get();
	 	$questions = Question::where('test_id','=', Input::get('test_id'))->get();
	 	$score = 0;


	 	$taketest = new TakeTest;
	 	$taketest->test_id = Input::get('test_id');
		$taketest->student_id = Auth::id();
		$taketest->date_taken = new DateTime;
		//$taketest->save();	



	 		foreach($questions as $key => $question){
	 			$answer = Input::get('answers'.$key);

		 		$testanswer = new TestAnswer;
		 		
				$t_id = $taketest->id;
				
				$testanswer->test_id			= Input::get('test_id');
				$testanswer->question_id		= $question->id;
				$testanswer->user_answer		= $answer;	
				$testanswer->student_id			= Auth::id();	
				$testanswer->save();

				if($question->correct_answer == $answer){
					++$score ;

					//$taketest = TakeTest::where('test_id', '=', $testanswer->id);

				}
	 		}
	 		$taketest->score = $score;//ayha ra masave if nahuman na ug store ang sa test_answes na attributes
	 		$taketest->save();
	 	//echo $score;
	 	echo'Thank you for taking up this test. Your total score is  ' . $score . ' / ' . count($questions);
	 	//Session::flash('message', 'Thank you for taking up this test. Your total score is  ' . $score . ' / ' . count($questions));
	 	//return Redirect::to('tests');
	 }
}
