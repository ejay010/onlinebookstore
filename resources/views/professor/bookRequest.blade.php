@extends('master')

@section('stylesheets')
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/shop-homepage.css" rel="stylesheet">
@endsection

@section('content')
{!! Form::open() !!}
<div class="form-group">
{!! Form::label('publisher', 'Publisher: ') !!}
{!! Form::text('publisher', null) !!}
</div>

<div class="form-group">
{!! Form::label('bookName', 'Book Name') !!}
{!! Form::text('bookName', null) !!}
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
{!! Form::submit() !!}
{!! Form::close() !!}
@endsection

@section('footer')
<a href="/professorPage">back</a>
@endsection
