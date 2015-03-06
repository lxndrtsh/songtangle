<?php namespace App\Interfaces;

/**
 * Interface UserMusicRepositoryInterface
 * @package App\Interfaces
 */
interface UserMusicRepositoryInterface
{
    public function addUserInstruments($user_id, $instruments);

    public function addUserGenres($user_id, $genres);
}