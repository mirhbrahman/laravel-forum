<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Session;
use Auth;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discussion.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'channel_id' => 'required',
            'title' => 'required|min:2|max:150',
            'content' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['slug'] = str_slug($request->title);
        $discussion = [];
        if ($discussion = Discussion::create($input)) {
            Session::flash('success','Discussion create successfull.');
        }

        return redirect()->route('discussion.show',['slug'=>$discussion->slug]);
    }

    public function show($slug)
    {
        $d = Discussion::where('slug',$slug)->first();
        return view('discussion.show',compact('d'));
    }
}
