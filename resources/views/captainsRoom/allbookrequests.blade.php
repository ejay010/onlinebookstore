<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
</script>
@if(Session::has('done'))
<img src="{{ Session::get('done') }}">
@endif

@foreach($bookRequests as $bookrequest)

{!! Form::model($bookRequests, ['data-remote']) !!}
{!! Form::label('ID: ') !!}
{{ $bookrequest['id'] }}
{!! Form::hidden('id', "$bookrequest[id]") !!}
<br>
{!! Form::label('Title: ') !!}
{{ $bookrequest['title'] }}
<br>
{!! Form::label('Author: ') !!}
{{ $bookrequest['author'] }}
<br>
{!! Form::label('Publisher:') !!}
{{ $bookrequest['publisher'] }}
<br>
{!! Form::label('Class:') !!}
{{ $bookrequest['class'] }}
<br>
{!! Form::label('Professor: ') !!}
{{ App\User::find($bookrequest['professor_id'])->username }}
<br>
{!! Form::label('Approved: ') !!}
{!! Form::select('approved', ['y' => 'yes', 'n' => 'No'], "$bookrequest[approved]") !!}

{!! Form::submit("approve", ["onclick" => "approveThis($bookrequest[id])"]) !!}

{!! Form::close() !!}
<br>
@endforeach