@if (count($errors) > 0)

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>errors</strong>

        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
@endif
