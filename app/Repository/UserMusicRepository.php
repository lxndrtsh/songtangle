<?php namespace App\Repository;

use App\Interfaces\UserMusicRepositoryInterface;
use App\Models\MusicGenre;
use App\Models\MusicInstrument;
use App\Models\UserMusicGenre;
use App\Models\UserMusicInstrument;

class UserMusicRepository implements UserMusicRepositoryInterface
{
    public function __construct(
        UserMusicGenre $userMusicGenre,
        UserMusicInstrument $userMusicInstrument,
        MusicInstrument $musicInstrument,
        MusicGenre $musicGenre
    ) {
        $this->userMusicGenre = $userMusicGenre;
        $this->userMusicInstrument = $userMusicInstrument;
        $this->musicGenre = $musicGenre;
        $this->musicInstrument = $musicInstrument;
    }

    public function addUserInstruments($user_id, $instruments)
    {
        $instrumentAdd = [];

        foreach($instruments as $key=>$value)
        {
            if($this->_instrumentExist($key) && $this->_instrumentNoInUser($user_id, $key)) {
                $now = new \Datetime;
                $instrumentAdd[] = [
                    'user_id' => $user_id,
                    'instrument_id' => $key,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }

        $this->userMusicInstrument->insert($instrumentAdd);
        return true;
    }

    public function addUserGenres($user_id, $genres)
    {
        $genreAdd = [];

        foreach($genres as $key=>$value)
        {
            if($this->_genreExist($key) && $this->_GenreNotInUser($user_id, $key)) {
                $now = new \Datetime;
                $genreAdd = [
                    'user_id' => $user_id,
                    'genre_id' => $key,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }

        $this->userMusicGenre->insert($genreAdd);
        return true;
    }

    protected function _instrumentExist($instrument_id)
    {
        if($this->musicInstrument->find($instrument_id)->count() < 1) {
            return false;
        }

        return true;
    }

    protected function _genreExist($genre_id)
    {
        if($this->musicGenre->find($genre_id)->count() <  1) {
            return false;
        }

        return true;
    }

    protected function _instrumentNoInUser($user_id, $instrument_id)
    {
        if($this->userMusicInstrument->where('user_id',$user_id)->where('instrument_id',$instrument_id)->count() === 1) {
            return false;
        }

        return true;
    }

    protected function _GenreNotInUser($user_id, $genre_id)
    {
        if($this->userMusicGenre->where('user_id',$user_id)->where('genre_id',$genre_id)->count() === 1) {
            return false;
        }

        return true;
    }
}