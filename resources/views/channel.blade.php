@extends('layouts.app')

@section('content')
    @if ($discussions)
        @foreach ($discussions as $d)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{$d->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span>{{$d->user->name}} <b>{{$d->created_at->diffForHumans()}}</b></span>

                    <a style="margin-left:5px" class="pull-right btn btn-xs btn-default" href="{{route('discussion.show',['slug'=>$d->slug])}}">View</a>

                    @if ($d->hasBestAns())
                        <span class="pull-right btn btn-xs btn-danger">Closed</span>
                    @else
                        <span class="pull-right btn btn-xs btn-success">Open</span>
                    @endif
                </div>

                <div class="panel-body">
                    <h4>
                        <b>{{$d->title}}</b>
                    </h4>

                    <p>
                        {{str_limit($d->content,150)}}
                    </p>
                </div>

                <div class="panel-footer">
                    <span>{{$d->replies->count()}} Replies</span>
                    <a href="{{route('channel',$d->channel->slug)}}" class="btn btn-xs btn-default pull-right">{{$d->channel->title}}</a>
                </div>
            </div>
        @endforeach

        <div class="text-center">
            {{$discussions->links()}}
        </div>
    @endif

@endsection
