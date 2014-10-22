<?php

class ConversationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$receiver_ids = Input::get('receiver_ids');
		$convo_name = "(untitled)";
		
		if(Input::get('convo_name') != null){
			$convo_name = Input::get('convo_name');
		}
		

		if(count($receiver_ids) ==0 ){
			Session::flash('message','no recepients');
			return Redirect::to('messages');
		}
		else{
			$convo = new Conversation;
			$convo->convo_name = $convo_name;
			$convo->save();
			
			foreach($receiver_ids as $id){
			$person = User::find($id);
			$convo->persons()->attach($person->id);
			}

			$convo->persons()->attach(Auth::id());

			return Redirect::to('conversations/'.$convo->convo_id);
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
		$convo = Conversation::find($id);
		$msgs = Message::where('convo_id','=',$convo->convo_id)->orderBy('msg_id','desc')->paginate(4);
		return View::make('conversation.show')
			->with(array(
				'convo' => $convo,
				'msgs' => $msgs
			));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
