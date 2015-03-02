<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MusicInstrument
 * @package App\Models
 */
class MusicInstrument extends Model
{
    protected $table = 'music_instruments';

    protected $fillable = ['id','instrument','created_at','updated_at'];
}