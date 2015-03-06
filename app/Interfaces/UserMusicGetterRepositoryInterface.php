<?php namespace App\Interfaces;

/**
 * Interface UserMusicGetterRepositoryInterface
 * @package App\Interfaces
 */
interface UserMusicGetterRepositoryInterface
{

    /**
     * @param $user_id
     */
    public function setUserId($user_id);

    /**
     * @param $instrument_id
     */
    public function setInstrumentId($instrument_id);

    /**
     * @param $genre_id
     */
    public function setGenreId($genre_id);

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__Count();

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__ByUserId();

    /**
     * @return UserMusicInstrument
     */
    public function getUserInstrument__ByInstrumentId();

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__Count();

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__ByUserId();

    /**
     * @return UserMusicGenre
     */
    public function getUserGenre__ByGenreId();
}