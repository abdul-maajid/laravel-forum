<?php

namespace App\Http\Controllers;

use Session;
use App\Discussion;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $validatedDiscussion = $request->validate([
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required|min:5',
        ]);
        
        $validatedDiscussion['user_id'] = Auth::id();
        $validatedDiscussion['slug'] = str_slug(request('title'));

        $discussion = Discussion::create($validatedDiscussion);

        Session::flash('success', 'Discussion Posted Successfully!');

        return redirect()->route('discussions.show', [ 'slug' => $discussion->slug ]);
    }

    public function show($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();
    
        return view('discussions.show', ['disc' => $discussion]);
    }

    public function reply(Request $request, $id)
    {
        $validatedReply = $request->validate([
            'reply' => 'required|min:3'
        ]);

        Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $validatedReply['reply'],
        ]);

        Session::flash('success', "Reply Posted Successfully!");
        return redirect()->back();
    }
}
