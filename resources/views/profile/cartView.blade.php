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
        <li><a href="#">Payment</a></li>
    </ol>
</div>

<div class="container text-center">

    <div class="col-md-5 col-sm-12">
        <div class="bigcart"></div>
        <h1>Your shopping cart</h1>
    </div>

    <div class="col-md-7 col-sm-12 text-left">
        <ul>
            <li class="row list-inline columnCaptions">
                <span>QTY</span>
                <span>ITEM</span>
                <span>Price</span>
            </li>
            {!! Form::open(['url' => '/checkOut']) !!}
            @foreach($items as $item)
            <li class="row">
                {!! Form::input('text', 'quantity', "$item[quantity]", ['id' => 'quantity', 'class' => 'quantity']) !!}
                <span class="itemName">{{ $item['title'] }}</span>
                {!! Form::hidden('id', "$item[id]") !!}
                <span id="itemprice" class="price">{{ $item['pprice'] }}</span>
            </li>
            @endforeach
            <li class="row totals">
                <span class="itemName">Total:</span>
                <span id="total" class="price">${{ $cartTotal }}</span>
                {!! Form::submit('Confirm Order', ['class' => 'order']) !!}
            </li>
            {!! Form::close() !!}
        </ul>
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
