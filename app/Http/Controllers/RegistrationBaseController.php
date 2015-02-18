<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory as ValidationFactory;

/**
 * Class RegistrationBaseController
 * @package App\Http\Controllers
 */
class RegistrationBaseController extends Controller {

	public function __construct(Request $request, ValidationFactory $validation)
	{
		$this->request = $request;
	}

	public function validateRegistrationRequest()
	{
		return true;
	}
}