@extends('layouts.layout')

@section('content')       
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if( !is_null($cart) && count($cart))
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    @php
                    $cartItem = $item['item'];
                    @endphp
                    <tr>
                        <td class="cart_product">
                        @if ($item['product']->category_id == 1)
                            <a href=""><img src="images/apple_small.png" alt=""></a>
                        @else
                        		<a href=""><img src="images/orange_small.png" alt=""></a>
                        @endif
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item['product']->name}}</a></h4>
                            <p>Web ID: {{$item['item']->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item['product']->price/100}}</p>
                        </td>
                        <td class="cart_quantity">
                        		1
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$item['product']->price/100}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href='{{url("cart-delete/$cartItem->id")}}'><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    
                    @endforeach
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Promotions</h3>
            <p>Apple:  buy one get one free</p>
            <p>Orange: buy 3 for the price of 2</p>
        </div>
        <div class="row">
            
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>${{$total/100}}</span></li>
                        <li> Discount <span>${{$discount/100}}</span>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{($total-$discount)/100}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{url('clear-cart')}}">Clear Cart</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection