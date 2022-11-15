@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">BORROWER</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td scope="row">{{$book->id}}</td>
                <td>{{$book->book_name}}</td>
                @if($book->user == null)
                <td style="color: blue">Available</td>
                <td>
                    <a href="{{url('/book/get/' . $book->id)}}" class="btn btn-success">Get</a>
                </td>
                @else
                <td>{{$book->user->name}}</td>
                    @if($userId == $book->user_id)
                        <td>
                            <a href="{{url('/book/returns/' . $book->id)}}" class="btn btn-dark">Returns</a>
                        </td>
                    @else
                        <td style="color: red">Not Available</td>
                    @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection