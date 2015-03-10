<?php namespace App\Http\Controllers;

use App\Interfaces\UserMusicGetterRepositoryInterface;
use App\Interfaces\UserSettingsGetterRepositoryInterface;
use App\Models\State;
use Illuminate\Http\Request;

//use App\Repository\UserRepository;

class UserController extends Controller {

    /**
     * @param UserSettingsGetterRepository|UserSettingsGetterRepositoryInterface $userSettings
     * @param UserMusicGetterRepositoryInterface $userMusic
     * @param Request $request
     * @param State $state
     * @internal param Guard $auth
     */
	public function __construct(
        UserSettingsGetterRepositoryInterface $userSettings,
        UserMusicGetterRepositoryInterface $userMusic,
        Request $request,
        State $state
    ) {
		$this->middleware('auth');
        $this->userSettings = $userSettings;
        $this->userMusic = $userMusic;
		$this->request = $request;
		$this->user = $request->user();
		$this->state = $state->states();
	}

	public function index()
	{
        $this->userSettings->setUserId($this->user->id);
        $this->userMusic->setUserId($this->user->id);

        $show = [
            'basicInformation' => true,
            'address' => true,
            'settings' => true,
            'instruments' => true,
            'genres' => true,
            'percentage' => 60
        ];

        if($this->isNameSet() && $this->isDobSet() && $this->isGenderSet()) {
            $show['basicInformation'] = false;
            $show['percentage'] += 10;
        }

        if($this->isAddressSet())  {
            $show['address'] = false;
            $show['percentage'] += 10;
        }

        if($this->isSettingSet()) {
            $show['settings'] = false;
            $show['percentage'] += 5;
        }

        if($this->isInstrumentSet()) {
            $show['instruments'] = false;
            $show['percentage'] += 2.5;
        }

        if($this->isGenderSet()) {
            $show['genres'] = false;
            $show['percentage'] += 2.5;
        }

		return view('profile.layout',['user'=>$this->user, 'states'=>$this->state, 'userSettings'=>$this->userSettings, 'show' => $show, 'birth' => new \Datetime($this->userSettings->getBasicInformation__DateOfBirth())]);
	}

    protected function isNameSet()
    {
        $set = $this->userSettings->getBasicInformation__Template_FullName();

        if(!$set) { return false; }

        if(!$set->firstname || !$set->lastname) {
            return false;
        }

        return true;
    }

    protected function isDobSet()
    {
        $set = $this->userSettings->getBasicInformation__DateOfBirth();

        if(!$set) { return false; }

        return true;
    }

    protected function isGenderSet()
    {
        $set = $this->userSettings->getBasicInformation__Gender();

        if(!$set) { return false; }

        return true;
    }

    protected function isAddressSet()
    {
        $set = $this->userSettings->getBasicInformation__Template_Location();

        if(!$set) {  return false; }

        if(!$set->address || !$set->city || !$set->state || !$set->zip_code) {
            return false;
        }

        return true;
    }

    protected function isSettingSet()
    {
        if(!$this->userSettings->getSetting__Count() == 1) {
            return false;
        }

        return true;
    }

    protected function isInstrumentSet()
    {
        if(!$this->userMusic->getUserInstrument__Count() == 1) {
            return false;
        }

        return true;
    }

    protected function isGenreSet()
    {
        if(!$this->userMusic->getUserGenre__Count() == 1) {
            return false;
        }

        return true;
    }


}