<?php namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Models\State;
use Illuminate\Http\Request;

//use App\Repository\UserRepository;

class UserController extends Controller {

	/**
	 * @param UserRepositoryInterface $user
	 * @param Request $request
	 * @param State $state
	 * @internal param Guard $auth
	 */
	public function __construct(UserRepositoryInterface $user, Request $request, State $state)
	{
		$this->middleware('auth');
		$this->user = $user;
		$this->request = $request;
		$this->user = $request->user();
		$this->state = $state->states();
	}

	public function index()
	{
		return view('profile.layout',['user'=>$this->user, 'states'=>$this->state]);
	}


}