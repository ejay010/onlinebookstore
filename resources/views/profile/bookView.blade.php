@extends('master')

    @section('stylesheets')
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/shop-item.css" rel="stylesheet">
    <style>
        p.description{
            word-wrap: break-word;
        }
    </style>
    @endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="center-block text-center">
            <h1>{{ $book['title'] }}</h1>
        </div>
        <div class="container">
            <div class="menu row">
                <div class="product col-lg-6">
                    <img class="img-responsive" src="/assets/bookImages/{{ $book['thumbnail'] }}">
                    </div>
                <div class="col-lg-6">
                    <hr>
                    <h2>{{ $book['title'] }}</h2>
                    <hr>
                    <h3>Description</h3>
                    <p class="description">{{ $book['description'] }}</p>
                    <h2 class="text-right">${{ $book['pprice'] }}</h2>
                    {!! Form::open(['url' => '/addToCart']) !!}
                    <div class="form-group">
                    {!! Form::label('quantity', 'Quantity: ') !!}
                    {!! Form::select('quantity', ['1' => '1', '2' => '2', '3' => '3'], 1, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::hidden('id', "$book[id]") !!}
                    {!! Form::submit('Add to Cart',  ['class' => 'btn btn-default']) !!}
                    <!--<button id="addToCart" class="btn btn-primary btn-lg ">Add to Cart</button>
                    <button type="submit" id="buyNow" class="btn btn-primary btn-lg">Buy Now</button>-->
                    {!! Form::close() !!}
                    <hr>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @foreach($comments as $comment)
                    @foreach($comment as $key => $value)
                    <h4>{{ $key }} said:</h4>
                    <p>{{ $value }} </p>
                    <hr>
                    @endforeach
                    @endforeach
              </div>
                <div class="col-lg-6">

                    @if(Auth::user())
                    {!! Form::open() !!}
                    <div class="form-group">
                    {!! Form::label('comment', 'Make A Comment: ') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Comment....']) !!}
                    </div>
                    {!! Form::hidden('user', "$userId") !!}
                    {!! Form::hidden('book', "$book[id]") !!}
                    {!! Form::submit('Post', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                    @else
                    <h4>Please login to make a comment</h4>
                    @endif
                </div>
          </div>
        </div>
    </div>
</div><!--/container-->
<hr>
@endsection
<!--/template-->
<!-- script references -->
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/myscripts.js"></script>
@endsection
