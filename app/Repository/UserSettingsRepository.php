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

    /**
     * @param $user_id
     * @param $packet
     * @return bool
     */
    public function basicInformation($user_id, $packet)
    {
        $biCount = $this->basicInformation->where('user_id',$user_id)->count();
        if($biCount === 0) {
            // New User, No Basic Information Set Yet
            return $this->newBasicInformation($user_id, $packet);
        }else{
            // Current User, Basic Information Needs Updating
            return $this->updateBasicInformation($user_id, $packet);
        }
    }

    /**
     * @param $user_id
     * @param $packet
     * @return bool
     */
    public function newBasicInformation($user_id, $packet)
    {
        $now = new \Datetime;
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
            'phone_number' => isset($packet['inputPhoneNumber']) ? $packet['inputPhoneNumber'] : '',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        return true;
    }

    /**
     * @param $user_id
     * @param $packet
     * @return bool
     */
    public function updateBasicInformation($user_id, $packet)
    {
        $current = $this->basicInformation->where('user_id',$user_id)->get()->first();
        $this->basicInformation->where('user_id',$user_id)->update([
            'firstname' => isset($packet['inputFirstname']) ? $packet['inputFirstname'] : $current->firstname,
            'lastname' => isset($packet['inputLastname']) ? $packet['inputLastname'] : $current->lastname,
            'date_of_birth' => isset($packet['inputDateOfBirth']) ? $packet['inputDateOfBirth'] : $current->date_of_birth,
            'gender' => isset($packet['inputGender']) ? $packet['inputGender'] : $current->gender,
            'address' => isset($packet['inputAddress1']) ? $packet['inputAddress1'] : $current->address,
            'address_2' => isset($packet['inputAddress2']) ? $packet['inputAddress2'] : $current->address_2,
            'city' => isset($packet['inputCity']) ? $packet['inputCity'] : $current->city,
            'state' => isset($packet['inputState']) ? $packet['inputState'] : $current->state,
            'zip_code' => isset($packet['inputPostalCode']) ? $packet['inputPostalCode'] : $current->zip_code,
            'phone_number' => isset($packet['inputPhoneNumber']) ? $packet['inputPhoneNumber'] : $current->phone_number
        ]);
        return true;
    }

}