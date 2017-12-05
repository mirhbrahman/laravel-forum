<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Like extends Model
{
    protected $fillable = ['reply_id','user_id'];

    public function reply()
    {
        $this->belongsTo('App\Reply');
    }
    public function user()
    {
        $this->belongsTo('App\User');
    }

    
}
