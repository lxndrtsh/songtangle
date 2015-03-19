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
     * @return User
     */
    public function getUserById($id)
    {
        return $this->user->where('id',$id)->get()->first();
    }

    /**
     * @param $alias
     * @return User
     */
    public function getUserByAlias($alias)
    {
        return $this->user->where('alias',$alias)->get()->first();
    }

    /**
     * @param $email
     * @return User
     */
    public function getUserByEmail($email)
    {
        return $this->user->where('email',$email)->get()->first();
    }
}