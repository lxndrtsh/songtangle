<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MusicGenre
 * @package App\Models
 */
class MusicGenre extends Model
{
    protected $table = 'music_genres';

    protected $fillable = ['id','genre','created_at','updated_at'];
}