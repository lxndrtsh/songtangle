<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\View\Factory as ViewFactory;
use Illuminate\Validation\Factory as ValidationFactory;

/**
 * Class RegistrationController
 * @package App\Http\Controllers
 */
class RegistrationController extends RegistrationBaseController {

	public function __construct(ViewFactory $view, Request $request, Session $session, ValidationFactory $validation)
	{
		parent::__construct($request, $validation);
		$this->view = $view;
		$this->request = $request;
		$this->session = $session;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$step = str_replace("/register/", "", $this->request->getRequestUri());
		$userId = $this->session->get('user-id');
		switch ($step) {
			case "user":
				if(isset($userId)) {
					$this->session->flush();
				}
				return $this->view->make('auth.register.user');
				break;
			case "basic-information":
				if(isset($userId)) {
					return $this->view->make('auth.register.basic_information', ['user_id' => $userId]);
				}else{
					return $this->view->make('errors.user', ['error_message' => 'You attempted to move to the next part of the registration without doing the first part.']);
				}
				break;
			case "settings":
				if(isset($userId)) {
					return $this->view->make('auth.register.basic_information', ['user_id' => $userId]);
				}else{
					return $this->view->make('errors.user', ['error_message' => 'You attempted to move to the next part of the registration without doing the first part.']);
				}
				return $this->view->make('auth.register.settings');
				break;
			default:
				if(isset($userId)) {
					$this->session->flush();
				}
				return $this->view->make('auth.register.user');
				break;
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$step = str_replace("/register/", "", $this->request->getRequestUri());
		$userId = $this->session->get('user-id');
		$this->validateRegistrationRequest();
		switch ($step) {
			case "user":
				if(isset($userId)) {
					$this->session->flush();
				}
				return $this->view->make('auth.register.user');
				break;
			case "basic-information":
				if(isset($userId)) {
					return $this->view->make('auth.register.basic_information', ['user_id' => $userId]);
				}else{
					return $this->view->make('errors.user', ['error_message' => 'You attempted to move to the next part of the registration without doing the first part.']);
				}
				break;
			case "settings":
				if(isset($userId)) {
					return $this->view->make('auth.register.basic_information', ['user_id' => $userId]);
				}else{
					return $this->view->make('errors.user', ['error_message' => 'You attempted to move to the next part of the registration without doing the first part.']);
				}
				return $this->view->make('auth.register.settings');
				break;
			default:
				if(isset($userId)) {
					$this->session->flush();
				}
				return $this->view->make('auth.register.user');
				break;
		}
	}

}
