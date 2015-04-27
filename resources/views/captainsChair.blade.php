<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" />
    <title>
        Captain's Chair Login
    </title>
    <link rel="stylesheet" type="text/css" href="css/captainsChairlogin.css" />
</head>
<body>

<br>
{!! Form::open()!!}
<h1>Welcome Captain</h1>
<div class="inset">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null) !!}
    <br>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null) !!}
    <br>
</div>
{!! Form::submit() !!}
{!! Form::close() !!}