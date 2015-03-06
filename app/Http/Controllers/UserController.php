<?php namespace App\Http\Controllers;

use App\Interfaces\UserSettingsGetterRepositoryInterface;
use App\Models\State;
use Illuminate\Http\Request;

//use App\Repository\UserRepository;

class UserController extends Controller {

    /**
     * @param UserSettingsGetterRepository|UserSettingsGetterRepositoryInterface $userSettings
     * @param Request $request
     * @param State $state
     * @internal param Guard $auth
     */
	public function __construct(
        UserSettingsGetterRepositoryInterface $userSettings,
        Request $request,
        State $state
    ) {
		$this->middleware('auth');
        $this->userSettings = $userSettings;
		$this->request = $request;
		$this->user = $request->user();
		$this->state = $state->states();
	}

	public function index()
	{
        $this->userSettings->setUserId($this->user->id);

        $show = [
            'basicInformation' => true,
            'address' => true,
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

		return view('profile.layout',['user'=>$this->user, 'states'=>$this->state, 'userSettings'=>$this->userSettings, 'show' => $show]);
	}

    protected function isNameSet()
    {
        $set = $this->userSettings->getBasicInformation__Template_FullName()->first();

        if(!$set) { return false; }

        if(!$set->firstname || !$set->lastname) {
            return false;
        }

        return true;
    }

    protected function isDobSet()
    {
        $set = $this->userSettings->getBasicInformation__DateOfBirth()->first();

        if(!$set) { return false; }

        if(!$set->date_of_birth) {
            return false;
        }

        return true;
    }

    protected function isGenderSet()
    {
        $set = $this->userSettings->getBasicInformation__Gender()->first();

        if(!$set) { return false; }

        if(!$set->gender) {
            return false;
        }

        return true;
    }

    protected function isAddressSet()
    {
        $set = $this->userSettings->getBasicInformation__Template_Location()->first();

        if(!$set) {  return false; }

        if(!$set->address || !$set->city || !$set->state || !$set->zip_code) {
            return false;
        }

        return true;
    }


}