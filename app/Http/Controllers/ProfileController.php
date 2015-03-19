<?php namespace App\Http\Controllers;

use App\Interfaces\UserMusicGetterRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserSettingsGetterRepositoryInterface;
use App\Models\State;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller {

    /**
     * @param UserSettingsGetterRepository|UserSettingsGetterRepositoryInterface $userSettings
     * @param UserMusicGetterRepositoryInterface $userMusic
     * @param UserRepositoryInterface $userRepository
     * @param Request $request
     * @internal param Guard $auth
     */
    public function __construct(
        UserSettingsGetterRepositoryInterface $userSettings,
        UserMusicGetterRepositoryInterface $userMusic,
        UserRepositoryInterface $userRepository,
        Request $request
    ) {
        $this->middleware('auth');
        $this->userSettings = $userSettings;
        $this->userMusic = $userMusic;
        $this->userRepository = $userRepository;
        $this->request = $request;
        $this->user = $request->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @param $alias
     * @return Response
     */
	public function show($alias)
	{
        $u = $this->userRepository->getUserByAlias($alias);
        $this->userSettings->setUserId($u->id);
        $this->userMusic->setUserId($u->id);

        return view('profile.u.layout',[
            'me' => $this->user,
            'u_userSettings' => $this->userSettings,
            'u_userMusic' => $this->userMusic,
            'u_User' => $u
        ]);
    }

}
