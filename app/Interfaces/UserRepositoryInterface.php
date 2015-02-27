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
     * @return mixed
     */
    public function getUserById($id);
}