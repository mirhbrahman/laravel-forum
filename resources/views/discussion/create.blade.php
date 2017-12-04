@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">Create a new discussion</div>

        <div class="panel-body">
            @include('includes.errors')
            {{Form::open(['route'=>'discussion.store','method'=>'post'])}}
            <label for="">Discussion title</label>
            {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Title'])}}
            
            <label for="">Pick a channel</label>
            <select class="form-control" name="channel_id">
                <option value="">Choose</option>
                @if ($channels)
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->title}}</option>
                    @endforeach
                @endif
            </select>

            <label for="">Ask a question</label>
            {{Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Content'])}}
            <br>
            <div class="text-center">
                {{Form::submit('Save Channel',['class'=>'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
