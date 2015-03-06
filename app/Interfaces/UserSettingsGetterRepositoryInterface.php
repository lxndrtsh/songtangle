<?php namespace App\Interfaces;

/**
 * Interface UserSettingsGetterRepositoryInterface
 * @package App\Interfaces
 */
interface UserSettingsGetterRepositoryInterface
{

    public function setUserId($user_id);

    public function getBasicInformation__Count();

    public function getBasicInformation__All();

    public function getBasicInformation_Id();

    public function getBasicInformation__Firstname();

    public function getBasicInformation__Lastname();

    public function getBasicInformation__DateOfBirth();

    public function getBasicInformation__Gender();

    public function getBasicInformation__Address1();

    public function getBasicInformation__Address2();

    public function getBasicInformation__City();

    public function getBasicInformation__State();

    public function getBasicInformation__ZipCode();

    public function getBasicInformation_PhoneNumber();

    public function getBasicInformation__Template_FullName();

    public function getBasicInformation__Template_Location();

    public function getSetting__Count();

    public function getSetting__All();

    public function getSetting__AllowFriendRequests();

    public function getSetting__AllowBandRequests();

    public function getSetting__AllowViewAge();

    public function getSetting__AllowViewGender();

    public function getSetting__AllowViewEmail();

    public function getSetting__AllowViewPhone();

    public function getSetting__AllowViewProfile();
}