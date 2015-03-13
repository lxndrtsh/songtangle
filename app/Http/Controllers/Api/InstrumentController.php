<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\MusicInstrumentRepositoryInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Support\Collection;

/**
 * Class InstrumentController
 * @package App\Http\Controllers\Api
 */
class InstrumentController extends Controller
{
    public function __construct(
        Request $request,
        Validation $validation,
        MusicInstrumentRepositoryInterface $instrument,
        Collection $collection
    ){
        $this->middleware('auth');
        $this->request = $request;
        $this->validation = $validation;
        $this->instrument = $instrument;
        $this->collection = $collection;
    }

    public function index()
    {
        if($this->request->get('via') === 'wildcard') {
            $this->validateRequest(
                ['instrument'=>$this->request->get('q')],
                ['instrument'=>'required|min:3']
            );

            $result = $this->instrument->getByWildcard($this->request->get('q'));

            $return = $this->collection->make([
                'requested_data' => 'InstrumentAPI',
                'response' => 200,
                'count' => $result->count(),
                'items' => $result
            ]);

            return response()->json($return->toArray());
        }else{
            $result = $this->instrument->getEverything();
            return response()->json($result->toArray());
        }
    }

    public function show($id)
    {
        $result = $this->music->getById($id);
    }

    protected function validateRequest($requestItems,$requirements)
    {
        $validator = $this->validation->make(
            $requestItems,
            $requirements
        );

        if($validator->fails()) {
            throw new InvalidArgumentException('Invalid argument for instrument: ' . $validator->messages());
        }
    }
}