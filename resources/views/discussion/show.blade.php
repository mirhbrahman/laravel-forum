@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{$d->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span>{{$d->user->name}} <b>{{$d->created_at->diffForHumans()}}</b></span>
            <a href="{{route('discussion.show',['slug'=>$d->slug])}}" class="pull-right btn btn-default">View</a>
        </div>

        <div class="panel-body">
            <h4 class="text-center">
                <b>{{$d->title}}</b>
            </h4>
            <hr>
            <p>
                {{$d->content}}
            </p>
        </div>

        <div class="panel-footer">
            <p>{{$d->replies->count()}} Replies</p>
        </div>
    </div>

    @if ($d->replies)
        @foreach ($d->replies as $r)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{$r->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span>{{$r->user->name}} <b>{{$r->created_at->diffForHumans()}}</b></span>
                </div>

                <div class="panel-body">
                    <p>
                        {{$r->content}}
                    </p>
                </div>
                <div class="panel-footer">
                    <p>LIKE</p>
                </div>
            </div>
        @endforeach
    @endif

@endsection
