@extends('master')
@section('stylesheets')
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../css/shop-homepage.css" rel="stylesheet">
@endsection

@section('title')
Captains Room - Admin Dashboard
@endsection
@section('links')
<li>
    @if(Auth::user())
    <a href="/logout">
        <span class="glyphicon glyphicon-log-out"></span> Log Out</a>
    @else
    <a href="/login">Log In</a>
    @endif
</li>
<li>
    <a href="/captainsRoom/addBook">Add a Book</a>
</li>
<li>
    <a href="/captainsRoom/bookRequests">All book Requests</a>
</li>
<li>
    <a href="/captainsRoom">Dashboard</a>
</li>
<li>
    <a href="/captainsRoom/allBooks">All Books</a>
</li>
<li>
    <a href="/captainsRoom/records">All Transactions</a>
</li>
@endsection

@if(Session::has('done'))
<img src="{{ Session::get('done') }}">
@endif

@section('content')
<div class="container">
    <div class="col-md-12">
        @foreach($books as $book)

        <div class="well form-inline">
            <div class="form-group">
                <label class="control-label">Date Made: </label>
                <p class="form-control-static">{{ $book->created_at }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Title: </label>
                <p class="form-control-static">{{ $book->title }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Author: </label>
                <p class="form-control-static">{{ $book->author }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Publisher: </label>
                <p class="form-control-static">{{ $book->publisher }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Price: </label>
                <p class="form-control-static">{{ $book->pprice }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">ISBN: </label>
                <p class="form-control-static">{{ $book->isbn }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Category: </label>
                <p class="form-control-static">{{ $book->category }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Book Description: </label>
                <p class="form-control-static">{{ $book->description }}</p>
            </div>

            <div class="form-group">
                <label class="control-label">Class Required for: </label>
                <p class="form-control-static">{{ $book->class }}</p>
            </div>

            <div class="form-group">
                <label class="control-label">Quantity On Hand: </label>
                <p class="form-control-static">{{ $book->onHand }}</p>
            </div>

        </div>
        <br>
        @endforeach
    </div>
</div>

@endsection