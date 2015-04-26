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
        @foreach($bookRequests as $bookrequest)
        {!! Form::model($bookRequests, ['data-remote']) !!}
        <div class="well">
            <div class="form-group">
                {!! Form::label('ID: ') !!}
                {{ $bookrequest['id'] }}
                {!! Form::hidden('id', "$bookrequest[id]") !!}
            </div>
            <div class="form-group">
                {!! Form::label('Title: ') !!}
                {{ $bookrequest['title'] }}
            </div>
            <div class="form-group">
                {!! Form::label('Author: ') !!}
                {{ $bookrequest['author'] }}
            </div>
            <div class="form-group">
                {!! Form::label('Publisher:') !!}
                {{ $bookrequest['publisher'] }}
            </div>
            <div class="form-group">
                {!! Form::label('Class:') !!}
                {{ $bookrequest['class'] }}
            </div>
            <div class="form-group">
                {!! Form::label('Professor: ') !!}
                {{ App\User::find($bookrequest['professor_id'])->username }}
            </div>
            <div class="form-group">
                {!! Form::label('Approved: ') !!}
                {!! Form::select('approved', ['y' => 'yes', 'n' => 'No'], "$bookrequest[approved]", ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit("approve", ["onclick" => "approveThis($bookrequest[id])", 'class' => 'btn btn-default pull-right']) !!}
            {!! Form::close() !!}
        </div>
        <br>
        @endforeach
    </div>
</div>

@endsection