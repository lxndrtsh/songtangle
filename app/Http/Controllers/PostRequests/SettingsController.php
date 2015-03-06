<?php namespace App\Http\Controllers\PostRequests;

use App\Interfaces\UserSettingsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as Validation;

/**
 * Class SettingsController
 * @package App\Http\Controllers\PostRequests
 */
class SettingsController extends PostRequestsBaseController
{
    /**
     * @param Request $request
     * @param Validation $validation
     * @param UserSettingsRepositoryInterface $settings
     */
    public function __construct(Request $request, Validation $validation, UserSettingsRepositoryInterface $settings)
    {
        parent::__construct($request, $validation);
        $this->middleware('auth');
        $this->user = $request->user();
        $this->settings = $settings;
    }

    public function updateAddress()
    {
        $this->_validateRequest(
            [
                $this->request->input('inputAddress1'),
                $this->request->input('inputCity'),
                $this->request->input('inputState'),
                $this->request->input('inputPostalCode')
            ],
            [
                'required|min:3',
                'required|min:3',
                'required',
                'required|numeric|min:5'
            ]
        );

        $this->settings->basicInformation($this->user->id, $this->request->only(['inputAddress1','inputAddress2','inputCity','inputState','inputPostalCode']));

        return redirect('/me');
    }

    public function updateBasics()
    {
        $this->_validateRequest(
            [
                $this->request->input('inputFirstname'),
                $this->request->input('inputLastname'),
                $this->request->input('inputGender'),
                $this->request->input('inputDateOfBirth')
            ],
            [
                'required|min:3',
                'required|min:3',
                'required|in:Male,Female',
                'required|date'
            ]
        );

        $this->settings->basicInformation($this->user->id, $this->request->only(['inputFirstname','inputLastname','inputGender','inputDateOfBirth']));

        return redirect('/me');
    }

    public function updateSettings()
    {
        $this->settings->setting($this->user->id, $this->request->only(
            'settingsAllowFriendRequest',
            'settingsAllowViewProfile',
            'settingsAllowBandRequest',
            'settingsAllowViewAge',
            'settingsAllowViewGender',
            'settingsAllowViewEmail',
            'settingsAllowViewPhone'
        ));
        return redirect('/me');
    }
}