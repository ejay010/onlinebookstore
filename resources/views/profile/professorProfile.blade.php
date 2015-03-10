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
    <a href="#">Book Requests</a>
</li>
@endsection

@section('content')
<h1>{{$user->username}}</h1>
<img src="http://www.dodaj.rs/f/2Q/fK/1DvX60rx/geniusmixtrap.jpg">
<br>
Just cause she bad..
<br>
<a class="btn" href="professorPage/requestBook">
    <span class="glyphicon glyphicon-book"></span> Request A Book</a>
<br>
<a class="btn" href="logout">
    <span class="glyphicon glyphicon-log-out"></span> Logout</a>
@endsection
