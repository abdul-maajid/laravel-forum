<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
    protected $fillable = ['content', 'user_id', 'discussion_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = [];

        foreach($this->likes as $like):
            array_push($likers, $like->user_id);
        endforeach;

        if(in_array($id, $likers)) {
            return ['isliked' => true, 'total_likes' => count($likers) !== 0 ? count($likers) : '' ];
        } else {
            return ['isliked' => false, 'total_likes' => count($likers) !== 0 ? count($likers) : '' ];
        }

    }
}
