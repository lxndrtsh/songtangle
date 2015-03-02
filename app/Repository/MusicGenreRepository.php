<?php namespace App\Repository;

use App\Interfaces\MusicGenreRepositoryInterface;
use App\Models\MusicGenre;

class MusicGenreRepository implements MusicGenreRepositoryInterface
{
    public function __construct(MusicGenre $musicGenre)
    {
        $this->musicGenre = $musicGenre;
    }

    /**
     * Gets a genre by ID
     *
     * @param $id
     * @return GenreCollection
     */
    public function getById($id)
    {
        $query = $this->musicGenre->select('id','genre')->where('id',$id)->get();
        return $query;
    }

    /**
     * Gets a genre by a wildcard string
     *
     * @param $wildcard
     * @return GenreCollection
     */
    public function getByWildcard($wildcard)
    {
        $query = $this->musicGenre->select('id','genre')->where('genre','LIKE','%'.$wildcard.'%')->get();
        return $query;
    }

    /**
     * Gets a collection of all genres
     *
     * @return GenreColection
     */
    public function getEverything()
    {
        $query = $this->musicGenre->select('id','genre')->get();
        return $query;
    }
}