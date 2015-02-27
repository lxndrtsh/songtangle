<?php namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
//use App\Repository\UserRepository;

class UserController extends Controller {

	/**
	 * @param UserRepositoryInterface $user
	 * @internal param Guard $auth
	 */
	public function __construct(UserRepositoryInterface $user)
	{
		$this->middleware('auth');
		$this->user = $user;
	}

	public function index()
	{
		return view('profile.layout',['user'=>'']);
	}


}