@extends('master2')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="../css/profesbook.css" />
<!-- Custom CSS -->
<link href="../css/templatemo_style2.css" rel="stylesheet" type="text/css" />
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

@section('logo')
<div id="templatemo_header"><img src="../images/newcompass.jpg" alt="" width="960" height="287" /></div>
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


<form action="/professorPage/requestBook" method="post" class="basic-grey">
    {!! Form::hidden('professor_id', $professor['id']) !!}
    {!! Form::token() !!}
    <h1>Book Request Form
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Book Title :</span>
        <input id="title" type="text" name="title" placeholder="Book Title" />
    </label>

    <label>
        <span>Publisher :</span>
        <input id="publisher" type="text" name="publisher" placeholder="Publisher" />
    </label>

    <label>
        <span>Author :</span>
        <input id="author" type="text" name="author" placeholder="Author" />
    </label>

    <label>
        <span>Edition :</span>
        <input id="edition" type="text" name="edition" placeholder="Edition" />
    </label>
    <label>
        <span>Class Required :</span>
        <input id="class" type="text" name="class" placeholder="Class" />
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Send" />
    </label>
</form>

@endsection

@section('footer')
<a href="/professorPage">back</a>
@endsection
