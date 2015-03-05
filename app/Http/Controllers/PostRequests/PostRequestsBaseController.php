<?php namespace App\Http\Controllers\PostRequests;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Http\Request;

/**
 * Class PostRequestsBaseController
 * @package App\Http\Controllers\PostRequests
 */
class PostRequestsBaseController extends Controller
{
    public function __construct(Request $request, Validation $validation)
    {
        $this->request = $request;
        $this->validation = $validation;
    }

    public function _validateRequest($request, $parameters)
    {
        $validator = $this->validation->make($request, $parameters);
        if($validator->fails()) {
            throw new \Exception('Validation failed: '. $validator->getMessageBag());
        }

        return true;
    }
}