<?php namespace App\Repository;

use App\Interfaces\PostingRepositoryInterface;
use App\Models\Friend;
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

    /** @var int */
    protected $range;

    /** @var int */
    protected $user_id;

    public function __construct(
        Posting $posting,
        User $user,
        UserBasicInformation $basicInformation,
        UserSetting $setting,
        Collection $collection,
        Friend $friend
    ) {
        $this->posting = $posting;
        $this->user = $user;
        $this->basicInformation = $basicInformation;
        $this->setting = $setting;
        $this->collection = $collection;
        $this->friend = $friend;
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
        $this->user_id = $user_id;
        $results = $this->collection->make();
        $friendArray = [];

        /*
         * Friends Query - Acquires all of the friends for the user_id account
         */
        $friends = $this->friend->where(function($query) {
            $query->where('user_id',$this->user_id)
                ->whereNotNull('accepted_at')
                ->whereNull('deleted_at');
        })->orWhere(function($query) {
            $query->where('friend_user_id',$this->user_id)
                ->whereNotNull('accepted_at')
                ->whereNull('deleted_at');
        })->get();

        foreach($friends->toArray() as $friend) {
            if($friend['user_id'] != $this->user_id) {
                $friendArray[] = $friend['user_id'];
            }
            if($friend['friend_user_id'] != $this->user_id) {
                $friendArray[] = $friend['friend_user_id'];
            }
        }

        $posting = $this->posting->where('posting_user_id',$user_id)->orWhereIn('posting_user_id',$friendArray)->orderBy('created_at')->skip($this->range['skip'])->take($this->range['take'])->get();

        if(!is_numeric($user_id)) {
            throw new \InvalidArgumentException('Invalid argument (u) passed. Expected a numerical value.');
        }

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