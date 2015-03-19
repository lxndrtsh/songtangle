<?php namespace App\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Interfaces
 */
interface UserRepositoryInterface
{
    /**
     *
     * Get User by ID
     *
     * @param $id
     * @return User
     */
    public function getUserById($id);

    /**
     * @param $alias
     * @return User
     */
    public function getUserByAlias($alias);

    /**
     * @param $email
     * @return User
     */
    public function getUserByEmail($email);
}