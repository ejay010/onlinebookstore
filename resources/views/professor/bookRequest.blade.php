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
{!! Form::open() !!}
<div class="form-group">
{!! Form::label('publisher', 'Publisher: ') !!}
{!! Form::text('publisher', null) !!}
</div>

<div class="form-group">
{!! Form::label('title', 'Book Title') !!}
{!! Form::text('title', null) !!}
</div>

<div class="form-group">
{!! Form::label('edition', 'Edition') !!}
{!! Form::text('edition', null) !!}
</div>

<div class="form-group">
{!! Form::label('author', 'Author of Book') !!}
{!! Form::text('author', null) !!}
</div>

<div class="form-group">
{!! Form::label('class', 'Class Required for') !!}
{!! Form::text('class', null) !!}
</div>

{!! Form::hidden('professor', $professor['username']) !!}
{!! Form::submit() !!}
{!! Form::close() !!}
@endsection

@section('footer')
<a href="/professorPage">back</a>
@endsection
