<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = ['user_id','channel_id','title','slug','content'];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }

    public function is_being_watch_by_auth_user()
    {
        $id = Auth::id();

        $watchers_id = array();

        foreach ($this->watchers as $w) {
            array_push($watchers_id, $w->user_id);
        }

        if (in_array($id, $watchers_id)) {
            return true;
        }else {
            return false;
        }
    }
}
