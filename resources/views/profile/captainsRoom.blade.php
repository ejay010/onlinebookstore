@extends('master2')
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
