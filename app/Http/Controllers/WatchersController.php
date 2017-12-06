<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use Auth;
use Session;

class WatchersController extends Controller
{
    public function watch($id)
    {
        $watch = new Watcher();

        $watch->discussion_id = $id;
        $watch->user_id = Auth::id();

        if ($watch->save()) {
            Session::flash('success','You watch this discussion');
        }

        return redirect()->back();
    }

    public function unwatch($id)
    {
        $watch = Watcher::where('discussion_id',$id)->where('user_id',Auth::id())->first();

        if ($watch->delete()) {
            Session::flash('success','You are no longer watching this discussion');
        }

        return redirect()->back();
    }
}
