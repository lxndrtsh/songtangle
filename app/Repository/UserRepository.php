<?php namespace App\Repository;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user by Id
     *
     * @param $id
     * @return mixed|void
     */
    public function getUserById($id)
    {
        return $this->user->where('id',$id)->get();
    }
}