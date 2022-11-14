@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
            <a href="{{url('/book/create/page')}}" class="btn btn-primary">Add new book</a>
            <hr/>
            @foreach ($books as $book)
            <tr>
                <td scope="row">{{$book->id}}</td>
                <td>{{$book->book_name}}</td>
                <td>
                    <form method="POST" action="{{ url('/book/delete' . '/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <span> | </span>
                    <a href="{{url('/book/edit/' . $book->id)}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection