@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">Update Reply</div>

        <div class="panel-body">
            @include('includes.errors')
            {{Form::model($reply,['route'=>['reply.update',$reply->id],'method'=>'put'])}}
            <label for="">Answer a question</label>
            {{Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Content'])}}
            <br>
            <div class="text-center">
                {{Form::submit('Update Reply',['class'=>'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
