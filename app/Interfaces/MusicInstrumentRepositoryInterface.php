<?php namespace App\Interfaces;

/**
 * Interface MusicInstrumentRepositoryInterface
 * @package App\Interfaces
 */
interface MusicInstrumentRepositoryInterface
{
    /**
     * Gets an instrument by ID
     *
     * @param $id
     * @return InstrumentCollection
     */
    public function getById($id);

    /**
     * Gets an instrument by a wildcard string
     *
     * @param $wildcard
     * @return InstrumentCollection
     */
    public function getByWildcard($wildcard);

    /**
     * Gets an instrument of all genres
     *
     * @return InstrumentCollection
     */
    public function getEverything();
}