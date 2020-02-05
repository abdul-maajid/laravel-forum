<?php

namespace App\Http\Controllers;

use App\Like;
use Auth;
use App\Reply;
use Session;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id(),
        ]);

        Session::flash('success', 'Reply Liked successfully');
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        Session::flash('success', 'Reply uniked successfully');
        return redirect()->back();
    }
}
