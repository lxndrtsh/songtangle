<?php namespace App\Http\Controllers\PostRequests;

use App\Interfaces\UserMusicRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as Validation;

/**
 * Class UserMusicController
 * @package App\Http\Controllers\PostRequests
 */
class UserMusicController extends PostRequestsBaseController
{
    public function __construct(Request $request, Validation $validation, UserMusicRepositoryInterface $userMusic)
    {
        parent::__construct($request, $validation);
        $this->middleware('auth');
        $this->user = $request->user();
        $this->userMusic = $userMusic;
    }

    public function updateInstruments()
    {
        $this->_validateRequest($this->request->input('instrumentsToSelect'),['instrumentsToSelect'=>'array']);
        $this->userMusic->addUserInstruments($this->user->id, $this->request->input('instrumentsToSelect'));
        return redirect('/me');
    }

    public function updateGenres()
    {
        $this->_validateRequest($this->request->input('genresToSelect'),['genresToSelect'=>'array']);
        $this->userMusic->addUserGenres($this->user->id, $this->request->input('genresToSelect'));
        return redirect('/me');
    }
}