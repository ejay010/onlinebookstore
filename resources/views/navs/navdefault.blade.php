<li>
    @if(Auth::user())
    <a href="/logout">
        <span class="glyphicon glyphicon-log-out"></span> Log Out</a>
    @else
    <a href="/login">Log In</a>
    @endif
</li>
<li>
    <a href="/">Home</a>
</li>
<li>
    <a href="about">About</a>
</li>

<li id="myCartLink" style="display: inline;">
    <a href="/viewCart" id="myCartValue">My Cart ({{ count(Session::get('cart')) }})</a>
</li>