@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Channels</div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if ($channels)
                        @foreach ($channels as $channel)
                            <tr>
                                <td>{{$channel->title}}</td>
                                <td>
                                    <div class="pull-left">
                                        <a class="btn btn-xs btn-info" href="{{route('channels.edit',$channel->id)}}">Edit</a>&nbsp
                                    </div>
                                    {{Form::open(['route'=>['channels.destroy',$channel->id],'method'=>'delete'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-xs btn-danger'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
