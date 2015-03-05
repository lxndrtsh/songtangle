<?php namespace App\Repository;

use App\Interfaces\UserSettingsRepositoryInterface;
use App\Models\User;
use App\Models\UserBasicInformation;

/**
 * Class UserSettingsRepository
 * @package App\Repository
 */
class UserSettingsRepository implements UserSettingsRepositoryInterface
{

    public function __construct(User $user, UserBasicInformation $basicInformation)
    {
        $this->user = $user;
        $this->basicInformation = $basicInformation;
    }

    public function basicInformation($user_id, $packet)
    {
        $biCount = $this->basicInformation->where('user_id',$user_id)->count();
        if($biCount === 0) {
            // New User, No Basic Information Set Yet
            $this->newBasicInformation($user_id, $packet);
            dd('test');
        }else{
            // Current User, Basic Information Needs Updating
            $this->updateBasicInformation($user_id, $packet);
            dd('updated test');
        }
    }

    public function newBasicInformation($user_id, $packet)
    {
        $this->basicInformation->insert([
            'user_id' => $user_id,
            'firstname' => isset($packet['inputFirstname']) ? $packet['inputFirstname'] : '',
            'lastname' => isset($packet['inputLastname']) ? $packet['inputLastname'] : '',
            'date_of_birth' => isset($packet['inputDateOfBirth']) ? $packet['inputDateOfBirth'] : '',
            'gender' => isset($packet['inputGender']) ? $packet['inputGender'] : '',
            'address' => isset($packet['inputAddress1']) ? $packet['inputAddress1'] : '',
            'address_2' => isset($packet['inputAddress2']) ? $packet['inputAddress2'] : '',
            'city' => isset($packet['inputCity']) ? $packet['inputCity'] : '',
            'state' => isset($packet['inputState']) ? $packet['inputState'] : '',
            'zip_code' => isset($packet['inputPostalCode']) ? $packet['inputPostalCode'] : '',
            'phone_number' => isset($packet['inputPhoneNumber']) ? $packet['inputPhoneNumber'] : ''
        ]);

        return true;

    }

    public function updateBasicInformation($user_id, $packet)
    {
        $this->basicInformation->where('user_id',$user_id)->update([
            'firstname' => isset($packet['inputFirstname']) ? $packet['inputFirstname'] : '',
            'lastname' => isset($packet['inputLastname']) ? $packet['inputLastname'] : '',
            'date_of_birth' => isset($packet['inputDateOfBirth']) ? $packet['inputDateOfBirth'] : '',
            'gender' => isset($packet['inputGender']) ? $packet['inputGender'] : '',
            'address' => isset($packet['inputAddress1']) ? $packet['inputAddress1'] : '',
            'address_2' => isset($packet['inputAddress2']) ? $packet['inputAddress2'] : '',
            'city' => isset($packet['inputCity']) ? $packet['inputCity'] : '',
            'state' => isset($packet['inputState']) ? $packet['inputState'] : '',
            'zip_code' => isset($packet['inputPostalCode']) ? $packet['inputPostalCode'] : '',
            'phone_number' => isset($packet['inputPhoneNumber']) ? $packet['inputPhoneNumber'] : ''
        ]);

        return true;

    }

}