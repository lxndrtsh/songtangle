<?php namespace App\Repository;

use App\Interfaces\PostingRepositoryInterface;
use App\Models\Posting;

/**
 * Class PostingRepository
 * @package App\Repository
 */
class PostingRepository implements PostingRepositoryInterface
{

    protected $range;

    public function __construct(Posting $posting)
    {
        $this->posting = $posting;
    }

    public function _setLimit($page, $limit)
    {
        $total = $page * $limit;
        if($total == $limit) {
            $this->range['skip'] = 0;
        }else{
            $this->range['skip'] = $total - $limit;
        }

        $this->range['take'] = $limit;
    }

    public function getPostingByUserId($user_id)
    {
        return $this->posting->where('posting_user_id',$user_id)->skip($this->range['skip'])->take($this->range['take'])->get();
    }

    public function getPostingById($id)
    {
        return $this->posting->where('id',$id)->get()->first();
    }

    public function createPosting($user_id,$posting)
    {

    }
}