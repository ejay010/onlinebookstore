@extends('master2')
@section('stylesheets')
<link href="../css/templatemo_style.css" rel="stylesheet">
<!-- Custom CSS -->

@endsection

@section('logo')
<div id="templatemo_header"><img src="../images/newcompass.jpg" alt="" width="960" height="287" /></div>
@endsection

@section('title')
Captains Room - Admin Dashboard
@endsection
@section('links')
<li>
    @if(Auth::user())
    <a href="/logout">
        <span class="glyphicon glyphicon-log-out"></span> Log Out</a>
    @else
    <a href="/login">Log In</a>
    @endif
</li>
<li>
    <a href="/captainsRoom/addBook">Add a Book</a>
</li>
<li>
    <a href="/captainsRoom/bookRequests">All book Requests</a>
</li>
<li>
    <a href="/captainsRoom">Dashboard</a>
</li>
<li>
    <a href="/captainsRoom/allBooks">All Books</a>
</li>
<li>
    <a href="/captainsRoom/records">All Transactions</a>
</li>
@endsection

@if(Session::has('done'))
<img src="{{ Session::get('done') }}">
@endif

@section('content')
<div class="container">
    <div class="col-md-12">
        @foreach($transactions as $transaction)

        <div class="well form-inline">
            <div class="form-group">
                <label class="control-label">Date Made:</label>
                <p class="form-control-static">{{ $transaction->created_at }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Title:</label>
                <p class="form-control-static">{{ $transaction->title }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Author:</label>
                <p class="form-control-static">{{ $transaction->author }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Publisher:</label>
                <p class="form-control-static">{{ $transaction->publisher }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Price:</label>
                <p class="form-control-static">{{ $transaction->pprice }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">ISBN:</label>
                <p class="form-control-static">{{ $transaction->isbn }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Category:</label>
                <p class="form-control-static">{{ $transaction->category }}</p>
            </div>
            <div class="form-group">
                <label class="control-label">Customer Full Name:</label>
                <p class="form-control-static">{{ $transaction->fullName }}</p>
            </div>

            <div class="form-group">
                <label class="control-label">Address Line 1:</label>
                <p class="form-control-static">{{ $transaction->address1 }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">Address Line 2:</label>
                <p class="form-control-static">{{ $transaction->address2 }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">City:</label>
                <p class="form-control-static">{{ $transaction->city }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">State:</label>
                <p class="form-control-static">{{ $transaction->state }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">Zip code:</label>
                <p class="form-control-static">{{ $transaction->zip }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">Country:</label>
                <p class="form-control-static">{{ $transaction->country }}</p>
            </div>


            <div class="form-group">
                <label class="control-label">Customer Email:</label>
                <p class="form-control-static">{{ $transaction->email }}</p>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</div>

@endsection