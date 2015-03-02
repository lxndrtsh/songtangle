<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\MusicGenreRepositoryInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as Validation;

/**
 * Class InstrumentController
 * @package App\Http\Controllers\Api
 */
class GenreController extends Controller
{
    public function __construct(Request $request, Validation $validation, MusicGenreRepositoryInterface $genre)
    {
        $this->request = $request;
        $this->validation = $validation;
        $this->genre = $genre;
    }

    public function index()
    {
        if($this->request->get('via') === 'wildcard') {
            $this->validateRequest(
                ['genre'=>$this->request->get('genre')],
                ['genre'=>'required|min:3']
            );

            $result = $this->genre->getByWildcard($this->request->get('genre'));
            return response()->json($result->toArray());
        }else{
            $result = $this->genre->getEverything();
            return response()->json($result->toArray());
        }
    }

    public function show($id)
    {
        $result = $this->genre->getById($id);
    }

    protected function validateRequest($requestItems,$requirements)
    {
        $validator = $this->validation->make(
            $requestItems,
            $requirements
        );

        if($validator->fails()) {
            throw new InvalidArgumentException('Invalid argument for genre: ' . $validator->messages());
        }
    }
}