<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$convos = Conversation::whereHas('persons',function($q){
			$q->where('person_id',Auth::id());
		})->get();

		return View::make('message.index')->with('convos', $convos);
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
		$convo = Conversation::find(Input::get('convo_id'));
		$user = Auth::user();

		if(Input::get('msg_content') == null){
			Session::flash('message','empty message. try again.');
			return Redirect::to('/conversations/'.$convo->convo_id);
		}
		else{
			$msg = new Message;
			$msg->convo_id = Input::get('convo_id');
			$msg->msg_content = Input::get('msg_content');
			$msg->sender_id = $user->id;
			$msg->unread = true;
			$msg->conversation()->associate($convo);
			$msg->save();



			return Redirect::to('/conversations/'.$convo->convo_id);
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
		// $msg = Message::find($id);
		// $sender = User::find($msg->sender_id);
		// $receiver = User::find($msg->receiver_id);
		// return View::make('message.show')
		// 	->with(array(
		// 		'sender' => $sender,
		// 		'receiver' => $receiver,
		// 		'msg' => $msg
		// 	));
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
