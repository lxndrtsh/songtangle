<?php namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

//use App\Repository\UserRepository;

class UserController extends Controller {

	/**
	 * @param UserRepositoryInterface $user
	 * @param Request $request
	 * @internal param Guard $auth
	 */
	public function __construct(UserRepositoryInterface $user, Request $request)
	{
		$this->middleware('auth');
		$this->user = $user;
		$this->request = $request;
		$this->user = $request->user();
	}

	public function index()
	{
		return view('profile.layout',['user'=>$this->user]);
	}


}