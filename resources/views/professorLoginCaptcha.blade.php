{!! Form::open('url' = 'professorLoginCaptcha') !!}

{!! Form::label('question', 'Question') !!}

{!! Form::text('answer', 'answer')!!}

{!! Form::submit() !!}
{!! Form::close() !!}