<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBasicInformation extends Model
{
    protected $table = 'user_basic_information';

    public function parentUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}