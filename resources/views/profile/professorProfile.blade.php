@extends('master')
@section('links')
<li>
    @if(Auth::user())
    <a href="/logout">
        <span class="glyphicon glyphicon-log-out"></span> Log Out</a>
    @else
    <a href="/professorLogin">Log In</a>
    @endif
</li>
<li>
    <a href="/professorPage">Dashboard</a>
</li>
<li>
    <a href="/professorPage/allbookRequests">Book Requests</a>
</li>
@endsection

@section('content')
<h1>{{$user->username}}</h1>
<div class="list-group">
<a class="btn list-group-item" href="professorPage/requestBook">
    <span class="glyphicon glyphicon-book"></span> Request A Book</a>
<br>
<a class="btn list-group-item" href="logout">
    <span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>
@endsection
