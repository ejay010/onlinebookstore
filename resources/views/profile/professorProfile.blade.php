@extends('master2')
@section('stylesheets')
<link href="css/professorstyle.css" rel="stylesheet" type="text/css" />
@endsection
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
<div id="templatemo_content">

    <h1 style="color: #050504"> Welcome Professor {{ $user->username }}!</h1>
    <br>

    <h2><span style="color: #010000">To make a book Request <a href="/professorPage/requestBook">Click Here</a></span></h2>
    <br>
    <br>
    <br>
    <a href="/logout" class="Log">Log Out!</a>
</div>
@endsection
