@if (count($errors))
    <div class="alert alert-danger">
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ol>
    </div>
@endif
