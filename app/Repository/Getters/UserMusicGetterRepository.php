<?php namespace App\Repository\Getters;

use App\Interfaces\UserMusicGetterRepositoryInterface;
use App\Models\UserMusicGenre;
use App\Models\UserMusicInstrument;

/**
 * Class UserMusicGetterRepository
 * @package App\Repository\Getters
 */
class UserMusicGetterRepository implements UserMusicGetterRepositoryInterface
{
    /** @var int */
    protected $user_id;

    /** @var int */
    protected $instrument_id;

    /** @var int */
    protected $genre_id;

    public function __construct(
        UserMusicInstrument $userMusicInstrument,
        UserMusicGenre $userMusicGenre
    ) {
        $this->userMusicInstrument = $userMusicInstrument;
        $this->userMusicGenre = $userMusicGenre;
    }

    /**
     * @param $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param $instrument_id
     */
    public function setInstrumentId($instrument_id)
    {
        $this->instrument_id = $instrument_id;
    }

    /**
     * @param $genre_id
     */
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__Count()
    {
        return $this->userMusicInstrument->where('user_id',$this->user_id)->count();
    }

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__ByUserId()
    {
        return $this->userMusicInstrument->where('user_id',$this->user_id)->get();
    }

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__ByInstrumentId()
    {
        return $this->userMusicInstrument->where('instrument_id',$this->instrument_id)->get();
    }

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__Count()
    {
        return $this->userMusicGenre->where('user_id',$this->user_id)->count();
    }

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__ByUserId()
    {
        return $this->userMusicGenre->where('user_id',$this->user_id)->get();
    }

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__ByGenreId()
    {
        return $this->userMusicGenre->where('genre_id',$this->genre_id)->get();
    }

}