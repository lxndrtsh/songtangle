<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posting
 * @package App\Models
 */
class Posting extends Model
{
    protected $table = 'postings';

    protected function originalPoster()
    {
        return $this->belongsTo('App\Models\User');
    }
}