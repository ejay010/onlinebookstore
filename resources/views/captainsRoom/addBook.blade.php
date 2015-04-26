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

@section('content')
<div class="container">
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if(Session::has('flash_note'))
<p>{{ Session::get('flash_note') }}</p>
@endif
<div class="col-lg-12 col-md-12 col-sm-12 well">
{!! Form::open(['url' => 'captainsRoom/addBook', 'files' => true]) !!}
<div class="form-group">
{!! Form::label('thumbnail', 'Thumbnail: ') !!}
{!! Form::file('thumbnail') !!}
    <p class="help-block">Upload a thumbnail image for the book</p>
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:')!!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('author', 'Author: ') !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('publisher', 'Publisher: ') !!}
    {!! Form::text('publisher', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('pprice', 'Purchase Price: ') !!}
    {!! Form::text('pprice', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('rprice', 'Rental Price: ') !!}
    {!! Form::text('rprice', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('isbn', 'ISBN #:') !!}
    {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description: ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Category: ') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('class', 'Class required for') !!}
    {!! Form::text('class', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('professor_id', 'Professor: ') !!}
    {!! Form::select('professor_id', $names, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('onHand', 'Quantity On Hand: ') !!}
    {!! Form::text('onHand', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Book', ['class' => 'btn btn-default pull-right']) !!}
{!! Form::close() !!}
    <a href="/captainsRoom" class="btn btn-default pull-left">Back to Dashboard</a>
</div>

    </div>
@endsection