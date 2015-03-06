<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HideOnHome
 * @package App\Models
 */
class HideOnHome extends Model
{
    protected $table = 'hide_on_home';

    protected function userToHide()
    {
        return $this->belongsTo('App\Models\User');
    }
}