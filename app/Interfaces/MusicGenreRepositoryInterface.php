<?php namespace App\Interfaces;

/**
 * Interface MusicGenreRepositoryInterface
 * @package App\Interfaces
 */
interface MusicGenreRepositoryInterface
{
    /**
     * Gets a genre by ID
     *
     * @param $id
     * @return GenreCollection
     */
    public function getById($id);

    /**
     * Gets a genre by a wildcard string
     *
     * @param $wildcard
     * @return GenreCollection
     */
    public function getByWildcard($wildcard);

    /**
     * Gets a collection of all genres
     *
     * @return GenreColection
     */
    public function getEverything();
}