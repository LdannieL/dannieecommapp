@extends('layouts.main')

@section('content')

	<div id="shopping-cart">
    <h1>Shopping Cart & Checkout</h1>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <table border="1">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    {!! HTML::image($product->image, $product->name, array('width'=>'65', 'height'=>'37')) !!} 
                    {{ $product->name }}
                </td>
                <td>${{ $product->price }}</td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    ${{ $product->price }} 
                    <a href="/store/removeitem/{{ $product->id }}"> 
                        {!! HTML::image('img/remove.gif', 'Remove product') !!}
                    </a>
             
            </tr>
            @endforeach
            
            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ Cart::getTotal() }}<brgetTotal />
                    <span>TOTAL: ${{ Cart::getTotal() }}</span><br />

                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="dannie@shop.com"> 
                    <input type="hidden" name="item_name" value="eCommerce Store Purchase"> 
                    <input type="hidden" name="amount" value="{{ Cart::getTotal() }}">
                    <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                    {!! HTML::link('/', 'Continue Shopping', array('class'=>'tertiary-btn')) !!}
                    <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                </td>
            </tr>
        </table>
    </form>
</div><!-- end shopping-cart -->

@stop