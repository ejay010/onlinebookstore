@extends('master')
@section('stylesheets')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/custom.css"/>
@endsection

@section('content')
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Tortuga Online</a>
        <div class="navbar-right">
            <div class="container minicart"></div>
        </div>
    </div>
</nav>

<div class="container-fluid breadcrumbBox text-center">
    <ol class="breadcrumb">
        <li><a href="/viewCart">Review Order</a></li>
        <li><a href="/shipping">Review Shipping</a> </li>
        <li class="active"><a href="/checkOut">Payment</a></li>
    </ol>
</div>

<div class="container text-center">

    <div class="col-md-6 col-sm-12 well">
        <h1>Your shopping cart</h1>
        <ul>
            @foreach($items as $item)
            <hr/>
            <h3 class="itemName">{{ $item['quantity'] }} "{{ $item['title'] }}" @ ${{ $item['pprice'] }}</h3>
            <hr/>
            @endforeach
        </ul>
        <h3 class="">Total: ${{ $cartTotal }}</h3>
    </div>
    <div class="col-md-6 col-sm-12">
        <h1>Billing Information</h1>
        {!! Form::open(['id' => 'billing-form']) !!}
            <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'pull-left']) !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
            <div class="form-group">
        {!! Form::label('number', 'Number on Card:', ['class' => 'pull-left']) !!}
        {!! Form::text(null, null, ['data-stripe' => 'number', 'class' => 'form-control']) !!}
           </div>
            <div class="form-group">
        {!! Form::label('cvc', 'CVC:', ['class' => 'pull-left']) !!}
        {!! Form::text(null, null, ['data-stripe' => 'cvc', 'class' => 'form-control']) !!}
        </div>
            <div class="form-group">
        {!! Form::label('month', 'Month:', ['class' => 'pull-left']) !!}
        {!! Form::selectMonth(null, null, ['data-stripe' => 'exp-month', 'class' => 'form-control']) !!}
        </div>

            <div class="form-group">
        {!! Form::label('year', 'Year:', ['class' => 'pull-left']) !!}
        {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['data-stripe' => 'exp-year', 'class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Buy Now', ['id' => 'buyNowButton', 'class' => 'pull-right btn btn-default']) !!}
        <div class="payment-errors"></div>
        {!! Form::close() !!}
        </div>
    </div>

</div>

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
<!-- The popover content -->

<div id="popover" style="display: none">
    <a href="#" id="edit"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="#" id="remove"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endsection
<!-- JavaScript includes -->
@section('scripts')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/customjs.js"></script>
@endsection
