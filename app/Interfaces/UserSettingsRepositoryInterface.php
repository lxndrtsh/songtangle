<?php namespace App\Interfaces;

/**
 * Interface UserSettingsRepositoryInterface
 * @package App\Interfaces
 */
interface UserSettingsRepositoryInterface
{

    public function basicInformation($user_id, $packet);

    public function setting($user_id, $packet);

    public function newBasicInformation($user_id, $packet);

    public function updateBasicInformation($user_id, $packet);

    public function newSetting($user_id, $packet);

    public function updateSetting($user_id, $packet);

}