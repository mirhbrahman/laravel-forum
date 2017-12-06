<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        //$discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        $results = '';
        $filter = (string)request('filter');

        switch ($filter) {
            case 'me':
                $results = Discussion::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(3);
                break;

            case 'solved':
                $answers = array();
                foreach (Discussion::all() as $d) {
                    if ($d->hasBestAns()) {
                        array_push($answers, $d);
                    }
                }
                $results = new Paginator($answers, 3);
                break;

                case 'unsolved':
                    $unanswers = array();
                    foreach (Discussion::all() as $d) {
                        if (!$d->hasBestAns()) {
                            array_push($unanswers, $d);
                        }
                    }
                    $results = new Paginator($unanswers, 3);
                    break;

            default:
                $results = Discussion::orderBy('created_at','desc')->paginate(3);
                break;
        }

        return view('forum')->with('discussions', $results);
    }
    public function channel($slug)
    {
        $channel = Channel::where('slug',$slug)->first();
        return view('channel')->with('discussions',$channel->discussions()->paginate(3));
    }
}
