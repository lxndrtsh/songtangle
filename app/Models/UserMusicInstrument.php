<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMusicInstrument extends Model
{
    protected $table = 'user_instruments';

    protected function parentUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}