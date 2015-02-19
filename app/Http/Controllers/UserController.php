<?php namespace App\Http\Controllers;

class UserController extends Controller {


	private $auth;

	/**
	 * @param Guard $auth
	 * @return Response
	 */
	public function __construc()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('home');
	}


}