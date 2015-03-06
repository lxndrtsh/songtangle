<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMusicGenre extends Model
{
    protected $table = 'user_genres';

    protected function parentUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}