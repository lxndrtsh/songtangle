<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\MusicGenreRepositoryInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Factory as Validation;

/**
 * Class InstrumentController
 * @package App\Http\Controllers\Api
 */
class GenreController extends Controller
{
    public function __construct(
        Request $request,
        Validation $validation,
        MusicGenreRepositoryInterface $genre,
        Collection $collection
    ){
        $this->request = $request;
        $this->validation = $validation;
        $this->genre = $genre;
        $this->collection = $collection;
    }

    public function index()
    {
        if($this->request->get('via') === 'wildcard') {
            $this->validateRequest(
                ['genre'=>$this->request->get('q')],
                ['genre'=>'required|min:3']
            );

            $result = $this->genre->getByWildcard($this->request->get('q'));

            $return = $this->collection->make([
                'requested_data' => 'GenreAPI',
                'response' => 200,
                'count' => $result->count(),
                'items' => $result
            ]);

            return response()->json($return->toArray());
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