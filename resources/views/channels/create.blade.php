@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Create a new Channel</div>

        <div class="panel-body">
            @include('includes.errors')
            {{Form::open(['route'=>'channels.store','method'=>'post'])}}
            {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Title'])}}
            <br>
            <div class="text-center">
                {{Form::submit('Save Channel',['class'=>'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
