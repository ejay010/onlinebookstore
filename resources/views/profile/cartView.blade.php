@extends('master2')
    @section('stylesheets')
<link rel="stylesheet" type="text/css" media="all" href="css/shopcart.css">
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    @endsection

@section('content')


<div id="w">
    <header id="title">
        <h1>Your Shopping Cart</h1>
    </header>
    <div id="page">
        <table id="cart">
            <thead>
            <tr>
                <th class="first">Title</th>
                <th class="second">Qty</th>
                <th class="third">Product</th>
                <th class="fourth">Line Total</th>
                <th class="fifth">Remove</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr class="productitm">
                <td>{{ $item['title'] }}</td>

                <td>{{ $item['quantity'] }}</td>
                <td><a href="books/{{ $item['id'] }}">change</a></td>
                <td>{{ $item['pprice'] }}</td>

                <td><form action="/removeFromCart" method="post">
                    {!! Form::token() !!}
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <span class="remove" ><button type="submit">"X"</button></span>
                </form></td>
            </tr>
            @endforeach

            <tr class="extracosts">
                <td class="light">Shipping &amp; Tax</td>
                <td colspan="2" class="light"></td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
            <tr class="totalprice">
                <td class="light">Total: ${{ $cartTotal }}</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2"><span class="thick"></span></td>
            </tr>


            <tr class="checkoutrow">
                <td colspan="5" class="checkout"><a href="/shipping" ><button id="submitbtn">Checkout Now!</button></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection






