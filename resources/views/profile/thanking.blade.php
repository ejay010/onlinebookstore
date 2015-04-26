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

<div class="container text-center">

    <div class="col-lg-12 col-md-5 col-sm-12 well">
        <div class="bigcart"></div>
        <h1>Thank You For Shopping with Tortuga Online Bookstore</h1>
        <a href="/" class="btn btn-default">Home</a>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/customjs.js"></script>
@endsection
