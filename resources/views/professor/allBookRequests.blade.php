@extends('master')

@section('stylesheets')
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/shop-homepage.css" rel="stylesheet">
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