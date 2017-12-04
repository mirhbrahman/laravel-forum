@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Channel: {{$channel->title}}</div>

        <div class="panel-body">
            @include('includes.errors')
            {{Form::model($channel,['route'=>['channels.update',$channel->id],'method'=>'put'])}}
            {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Title'])}}
            <br>
            <div class="text-center">
                {{Form::submit('Update Channel',['class'=>'btn btn-info'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
