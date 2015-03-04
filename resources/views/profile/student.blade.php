@extends('master')

@section('content')

<h1>{{ $user->username }}</h1>
<h3><a href="logout">Logout</a> </h3>

@endsection