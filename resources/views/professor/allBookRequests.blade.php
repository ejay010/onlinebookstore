@extends('master2')

@section('stylesheets')
<link href="../css/templatemo_style.css" rel="stylesheet">

<!-- Custom CSS -->
@endsection

@section('logo')
<div id="templatemo_header"><img src="../images/newcompass.jpg" alt="" width="960" height="287" /></div>
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
    <a href="#">Book Requests</a>
</li>
@endsection

@section('content')
@foreach ($bookRequests as $bookRequest)
<h1>{{ $bookRequest['title'] }} </h1>
<br>
@endforeach

@endsection