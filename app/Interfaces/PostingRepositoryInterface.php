<?php namespace App\Interfaces;

/**
 * Interface PostingRepositoryInterface
 * @package App\Interfaces
 */
interface PostingRepositoryInterface
{

    /**
     * @param $page
     * @param $limit
     * @return array
     */
    public function _setLimit($page, $limit);

    /**
     * @param $user_id
     * @return PostingCollection
     */
    public function getPostingByUserId($user_id);

    /**
     * @param $id
     * @return PostingCollection
     */
    public function getPostingById($id);

    /**
     * @param $user_id
     * @param $posting|array
     * @return boolean
     */
    public function createPosting($user_id,$posting);
}