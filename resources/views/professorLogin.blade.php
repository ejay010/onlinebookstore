@extends('master2')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="../css/profesbook.css" />
<!-- Custom CSS -->
<link href="../css/templatemo_style2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
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


<form action="professorLogin" method="post" class="basic-grey">
    {!! Form::token() !!}
    <h1>Professor Login
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Email:</span>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </label>

    <label>
        <span>Password:</span>
        <input type="password" class="form-control" name="password">
    </label>

    <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Login" />
    </label>

    <label>
        <span>&nbsp;</span>
        <a href="professorRegister">Register</a>
    </label>
</form>
@endsection