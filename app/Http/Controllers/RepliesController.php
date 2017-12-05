<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;
use Session;

class RepliesController extends Controller
{
    public function reply(Request $request, $id)
    {
        $this->validate($request,[
            'content' => 'required|min:2|max:500',
        ]);

        $reply = new Reply();
        $reply->user_id = Auth::id();
        $reply->discussion_id = $id;
        $reply->content = $request->content;

        if ($reply->save()) {
            Session::flash('success', 'Replied to discussion.');
        }

        return redirect()->back();
    }

    public function like($id)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->reply_id = $id;

        if ($like->save()) {
            Session::flash('success', 'You liked the reply.');
        }

        return redirect()->back();
    }

    public function unlike($id)
    {
        $reply = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        if ($reply->delete()) {
            Session::flash('success', 'You unliked the reply.');
        }

        return redirect()->back();
    }
}
