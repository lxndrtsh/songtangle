<?php namespace App\Repository\Getters;

use App\Interfaces\UserSettingsGetterRepositoryInterface;
use App\Models\UserBasicInformation;
use App\Models\UserSetting;

/**
 * Class UserSettingsGetterRepository
 * @package App\Repository
 */
class UserSettingsGetterRepository implements UserSettingsGetterRepositoryInterface
{

    /** @var int */
    protected $user_id;

    public function __construct(
        UserBasicInformation $basicInformation,
        UserSetting $userSetting
    ){
        $this->basicInformation = $basicInformation;
        $this->userSetting = $userSetting;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getBasicInformation__Count()
    {
        return $this->basicInformation->where('user_id',$this->user_id)->count();
    }

    public function getBasicInformation__All()
    {
        return $this->basicInformation->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation_Id()
    {
        return $this->basicInformation->select('id')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Firstname()
    {
        return $this->basicInformation->select('firstname')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Lastname()
    {
        return $this->basicInformation->select('lastname')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__DateOfBirth()
    {
        return $this->basicInformation->select('date_of_birth')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Gender()
    {
        return $this->basicInformation->select('gender')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Address1()
    {
        return $this->basicInformation->select('address')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Address2()
    {
        return $this->basicInformation->select('address_2')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__City()
    {
        return $this->basicInformation->select('city')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__State()
    {
        return $this->basicInformation->select('state')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__ZipCode()
    {
        return $this->basicInformation->select('zip_code')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation_PhoneNumber()
    {
        return $this->basicInformation->select('phone_number')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Template_FullName()
    {
        return $this->basicInformation->select('firstname', 'lastname')->where('user_id',$this->user_id)->get();
    }

    public function getBasicInformation__Template_Location()
    {
        return $this->basicInformation->select('address', 'address_2', 'city', 'state', 'zip_code')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__Count()
    {
        return $this->userSetting->where('user_id',$this->user_id)->count();
    }

    public function getSetting__All()
    {
        return $this->userSetting->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowFriendRequests()
    {
        return $this->userSetting->select('allow_friend_requests')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowBandRequests()
    {
        return $this->userSetting->select('allow_band_requests')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowViewAge()
    {
        return $this->userSetting->select('allow_view_age')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowViewGender()
    {
        return $this->userSetting->select('allow_view_gender')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowViewEmail()
    {
        return $this->userSetting->select('allow_view_email')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowViewPhone()
    {
        return $this->userSetting->select('allow_view_phone')->where('user_id',$this->user_id)->get();
    }

    public function getSetting__AllowViewProfile()
    {
        return $this->userSetting->select('allow_view_profile')->where('user_id',$this->user_id)->get();
    }
}