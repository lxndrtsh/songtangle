<?php namespace App\Http\Controllers;

//use App\Interfaces\UserRepositoryInterface;
use App\Repository\UserRepository;

class UserController extends Controller {


	private $auth;

	/**
	 * @param UserRepository $user
	 * @internal param Guard $auth
	 */
	public function __construct(UserRepository $user)
	{
		$this->middleware('auth');
		$this->user = $user;
	}

	public function index()
	{
		return view('profile.layout',['user'=>'']);
	}


}