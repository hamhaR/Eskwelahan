<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::where('receiver_id','=',Auth::user()->id)->get();
		return View::make('message.index')->with('messages', $messages);
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
		$user = Auth::user();
		$msg = new Message;
		$msg->msg_content = Input::get('msg_content');
		$msg->sender_id = $user->id;
		$msg->receiver_id = Input::get('receiver_id');
		$msg->save();

		return Redirect::to('/messages');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$msg = Message::find($id);
		$sender = User::find($msg->sender_id);
		$receiver = User::find($msg->receiver_id);
		return View::make('message.show')
			->with(array(
				'sender' => $sender,
				'receiver' => $receiver,
				'msg' => $msg
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
