
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


@if(Session::has('flash_note'))
<p>{{ Session::get('flash_note') }}</p>
@endif

{!! Form::open(['url' => 'captainsRoom/addBook','files' => true]) !!}
{!! Form::label('thumbnail', 'Thumbnail: ') !!}
{!! Form::file('thumbnail') !!}
<br>
{!! Form::label('title', 'Title:')!!}
{!! Form::text('title', null) !!}
<br>
{!! Form::label('author', 'Author: ') !!}
{!! Form::text('author', null) !!}
<br>
{!! Form::label('publisher', 'Publisher: ') !!}
{!! Form::text('publisher', null) !!}
<br>
{!! Form::label('pprice', 'Purchase Price: ') !!}
{!! Form::text('pprice', null) !!}
<br>
{!! Form::label('rprice', 'Rental Price: ') !!}
{!! Form::text('rprice', null) !!}
<br>
{!! Form::label('isbn', 'ISBN #:') !!}
{!! Form::text('isbn', null) !!}
<br>
{!! Form::label('description', 'Description: ') !!}
{!! Form::textarea('description', null) !!}
<br>
{!! Form::label('category', 'Category: ') !!}
{!! Form::text('category', null) !!}
<br>
{!! Form::label('class', 'Class required for') !!}
{!! Form::text('class', null) !!}
<br>
{!! Form::label('professor_id', 'Professor: ') !!}
{!! Form::select('professor_id', $names, null) !!}
<br>
{!! Form::label('onHand', 'Quantity On Hand: ') !!}
{!! Form::text('onHand', null) !!}
<br>
{!! Form::submit() !!}
{!! Form::close() !!}

<a href="/captainsRoom">Back to Dashboard</a>