<?php namespace App\Repository;

use App\Interfaces\MusicInstrumentRepositoryInterface;
use App\Models\MusicInstrument;

/**
 * Class MusicInstrumentRepository
 * @package App\Repository
 */
class MusicInstrumentRepository implements MusicInstrumentRepositoryInterface
{
    public function __construct(MusicInstrument $musicInstrument)
    {
        $this->musicInstrument = $musicInstrument;
    }

    /**
     * Gets an instrument by ID
     *
     * @param $id
     * @return InstrumentCollection
     */
    public function getById($id)
    {
        $query = $this->musicInstrument->select('id','instrument')->where('id',$id)->get();
        return $query;
    }

    /**
     * Gets an instrument by a wildcard string
     *
     * @param $wildcard
     * @return InstrumentCollection
     */
    public function getByWildcard($wildcard)
    {
        $query = $this->musicInstrument->select('id','instrument')->where('instrument','LIKE','%'.$wildcard.'%')->get();
        return $query;
    }

    /**
     * Gets an instrument of all genres
     *
     * @return InstrumentCollection
     */
    public function getEverything()
    {
        $query = $this->musicInstrument->select('id','instrument')->get();
        return $query;
    }
}