@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">Update discussion</div>

        <div class="panel-body">
            @include('includes.errors')
            {{Form::model($discussion,['route'=>['discussion.update',$discussion->id],'method'=>'put'])}}
            <label for="">Ask a question</label>
            {{Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Content'])}}
            <br>
            <div class="text-center">
                {{Form::submit('Update Discussion',['class'=>'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
