<?php

class FriendController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$user = Auth::user();
			$friends = $user->friends()->where('user_id','=',$user->id)->where('confirmed','=', true)->get();
			$pending_confirmations = $user->friends()->where('user_id','=',$user->id)->where('requested','=',false)->where('confirmed','=', false)->get();
			$pending_requests = $user->friends()->where('user_id','=',$user->id)->where('requested','=',true)->where('confirmed','=', false)->get();
		
			return View::make('friends.index')->with(array(
				'friends' => $friends,
				'confirmations' => $pending_confirmations,
				'requests' => $pending_requests
			));
		
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
		$user->friends()->attach(Input::get('friend_id'),array(
			'confirmed' => false,
			'requested' => true
		));
		$user->save();
		$friend = User::find(Input::get('friend_id'));
		$friend->friends()->attach($user->id,array(
			'confirmed' => false,
			'requested' => false
		));
		$friend->save();
		
		return Redirect::to('friends');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$user = Auth::user();
		$user->friends()->detach($id);
		$user->save();

		$friend = User::find($id);
		$friend->friends()->detach($user->id);
		$friend->save();
		return Redirect::to('friends');

	}

	public function confirm(){
		$u_id = Input::get('u_id');
		$f_id = Input::get('f_id');

		$you = User::find($u_id);
		$you->friends()->detach($f_id);
		$you->friends()->attach($f_id,array(

			'confirmed' => true,
			'requested' => false
		));
		$you->save();

		$friend = User::find($f_id);
		$friend->friends()->detach($u_id);
		$friend->friends()->attach($u_id,array(

			'confirmed' => true,
			'requested' => true

		));
		$friend->save();

		return Redirect::to('friends');

		}

	public function unconfirm(){
		$u_id = Input::get('u_id');
		$f_id = Input::get('f_id');

		$you = User::find($u_id);
		$friend = User::find($f_id);

		$you->friends()->detach($f_id);
		$friend->friends()->detach($u_id);

		$you->save();
		$friend->save();

		return Redirect::to('friends');
	}


}
