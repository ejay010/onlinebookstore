<!DOCTYPE html>
<html>
<head>
    <title>Captain's Chair | Admin Login</title>
</head>
<body>
<p>Login or suffer the penalty</p>
<br>
{!! Form::open()!!}
{!! Form::label('email', 'Email') !!}
{!! Form::text('email', null) !!}
<br>
{!! Form::label('password', 'Password') !!}
{!! Form::password('password', null) !!}
<br>
{!! Form::submit() !!}
{!! Form::close() !!}
<hr/>
<img src="http://www.primagames.com/media/images/news/assassins_creed_4_black_flag_big.jpg" width="1000" height="600">
</body>
</html>