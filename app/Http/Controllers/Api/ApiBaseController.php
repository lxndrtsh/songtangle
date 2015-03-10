<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Factory as Validation;

/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 */
class ApiBaseController extends Controller
{

    public function __construct(Request $request, Validation $validation)
    {
        $this->request = $request;
        $this->validation = $validation;
    }

}