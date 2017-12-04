@extends('layouts.app')

@section('content')
    @if ($discussions)
        @foreach ($discussions as $d)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{$d->user->avatar}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                    <span>{{$d->user->name}} <b>{{$d->created_at->diffForHumans()}}</b></span>
                    <a href="{{route('discussion.show',['slug'=>$d->slug])}}" class="pull-right btn btn-default">View</a>
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
                    <p>{{$d->replies->count()}} Replies</p>
                </div>
            </div>
        @endforeach

        <div class="text-center">
            {{$discussions->links()}}
        </div>
    @endif

@endsection
