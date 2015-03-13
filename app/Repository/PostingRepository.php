<?php namespace App\Repository;

use App\Interfaces\PostingRepositoryInterface;
use App\Models\Posting;
use App\Models\User;
use App\Models\UserBasicInformation;
use App\Models\UserSetting;
use Illuminate\Support\Collection;

/**
 * Class PostingRepository
 * @package App\Repository
 */
class PostingRepository implements PostingRepositoryInterface
{

    protected $range;

    public function __construct(
        Posting $posting,
        User $user,
        UserBasicInformation $basicInformation,
        UserSetting $setting,
        Collection $collection
    ) {
        $this->posting = $posting;
        $this->user = $user;
        $this->basicInformation = $basicInformation;
        $this->setting = $setting;
        $this->collection = $collection;
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
        $results = $this->collection->make();
        $posting = $this->posting->where('posting_user_id',$user_id)->skip($this->range['skip'])->take($this->range['take'])->get();
        foreach($posting as $post)
        {
            $postingCollection = $this->collection->make([
                'id' => $post->id,
                'content' => $post->posting_content,
                'type' => $post->posting_type_id,
                'url' => $post->url,
                'posting_user_account' => $this->user->where('id',$post->posting_user_id)->get()->first(),
                'posting_user_information' => $this->basicInformation->where('user_id',$post->posting_user_id)->get()->first(),
                'share_user_account' => ($post->posting_type_id == 2) ? $this->user->where('id',$post->share_user_id)->get()->first() : null,
                'share_user_information' => ($post->posting_type_id == 2) ? $this->basicInformation->where('user_id',$post->share_user_id)->get()->first() : null,
                'created_at' => new \DateTime($post->created_at),
                'updated_at' => new \DateTime($post->updated_at)
            ]);
            $results->push($postingCollection);
        }

        return $results;
    }

    public function getPostingById($id)
    {
        $results = $this->collection->make();
        $post = $this->posting->where('id',$id)->get()->first();
        $postingCollection = $this->collection->make([
            'id' => $post->id,
            'content' => $post->posting_content,
            'type' => $post->posting_type_id,
            'url' => $post->url,
            'posting_user_account' => $this->user->where('id',$post->posting_user_id)->get()->first(),
            'posting_user_information' => $this->basicInformation->where('user_id',$post->posting_user_id)->get()->first(),
            'share_user_account' => ($post->posting_type_id == 2) ? $this->user->where('id',$post->share_user_id)->get()->first() : null,
            'share_user_information' => ($post->posting_type_id == 2) ? $this->basicInformation->where('user_id',$post->share_user_id)->get()->first() : null,
            'created_at' => new \DateTime($post->created_at),
            'updated_at' => new \DateTime($post->updated_at)
        ]);
        $results->push($postingCollection);

        return $results;
    }

    public function createPosting($user_id,$posting)
    {

    }
}