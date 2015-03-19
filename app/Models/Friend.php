<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Friend
 * @package App\Models
 */
class Friend extends Model
{
    protected $table = 'friends';

    protected function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected function friend()
    {
        return $this->belongsTo('App\Models\User', 'friend_user_id');
    }
}