@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('book/Update/'. $data->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control"></br>
            <input type="submit" value="Save" class="btn btn-success"></br>
        </form>
    </div>
@endsection