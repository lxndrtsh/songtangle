<?php namespace App\Http\Controllers\Api;


use App\Interfaces\PostingRepositoryInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Factory as Validation;

/**
 * Class PostingController
 * @package App\Http\Controllers\Api
 */
class PostingController extends ApiBaseController {

    /** @var int */
    protected $user;

    /** @var int */
    protected $limit;

    /** @var int */
    protected $page;

    public function __construct(Request $request, Validation $validation, PostingRepositoryInterface $posting)
    {
        parent::__construct($request, $validation);
        $this->middleware('auth');
        $this->user = $request->user();
        $this->limit = $request->exists('limit') ? $this->request->get('limit') : 50;
        $this->page = $request->exists('page') ? $this->request->get('page') : 1;
        $this->posting = $posting;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->posting->_setLimit($this->page,$this->limit);
        $result = $this->posting->getPostingByUserId($this->user->id);
        return response()->json($result->toArray());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$result = $this->posting->getPostingById($id);
        return response()->json($result->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
