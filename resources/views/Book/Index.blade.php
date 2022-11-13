@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">BORROWER</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <th>{{$book->Name}}</th>
               
             
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection