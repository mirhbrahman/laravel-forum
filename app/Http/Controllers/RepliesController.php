<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reply;
use App\Like;
use App\Discussion;
use Auth;
use Session;
use Notification;

class RepliesController extends Controller
{
    public function reply(Request $request, $id)
    {
        $this->validate($request,[
            'content' => 'required|min:2|max:500',
        ]);

        $d = Discussion::find($id);

        $reply = new Reply();
        $reply->user_id = Auth::id();
        $reply->discussion_id = $id;
        $reply->content = $request->content;

        if ($reply->save()) {
            //..........give te reply points
            $reply->user->points += 25;
            $reply->user->save();
            //..........notify watch user
            $watchers = array();

            foreach ($d->watchers as $w) {
                array_push($watchers, User::find($w->user_id));
            }

            Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

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

    public function bestAns($id)
    {
        $reply = Reply::find($id);
        $reply->best_ans = 1;
        if ($reply->save()) {
            //..........give te reply points
            $reply->user->points += 100;
            $reply->user->save();

            Session::flash('success', 'You has been marked as best answer.');
        }
        return redirect()->back();
    }
}
