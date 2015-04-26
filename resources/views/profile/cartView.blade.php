@extends('master')
    @section('stylesheets')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/custom.css"/>
    @endsection

@section('content')
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Your online store</a>
        <div class="navbar-right">
            <div class="container minicart"></div>
        </div>
    </div>
</nav>

<div class="container-fluid breadcrumbBox text-center">
    <ol class="breadcrumb">
        <li class="active"><a href="#">Review Order</a></li>
    </ol>
</div>

<div class="container text-center">

    <div class="col-lg-12 col-md-7 col-sm-12 well">
        <div>
            @foreach($items as $item)
        <hr/>

        <h3 class="itemName">"{{ $item['title'] }}", ${{ $item['pprice'] }} * {{ $item['quantity'] }}</h3>
                <div class="form-group">
                    <a href="books/{{ $item['id'] }}" class="btn btn-default">Change Quantity</a>
                    <form action="/removeFromCart" method="post">
                        {!! Form::token() !!}
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn-danger">Remove</button>
                    </form>
                </div>
        <hr/>

            </div>
            @endforeach

        <h3 class="">Total: ${{ $cartTotal }}</h3>
        <div class="pull-right">
            <a href="/shipping" class="btn btn-default">Confirm</a>
        </div>
    </div>
    </div>
</div>

<!-- The popover content -->

<div id="popover" style="display: none">
    <a href="#" id="edit"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="#" id="remove"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endsection
<!-- JavaScript includes -->
@section('scripts')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/customjs.js"></script>
@endsection
