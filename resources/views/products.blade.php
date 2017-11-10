@extends('layouts.layout')

@section('content')       

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Products</h2>
                    @foreach ($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                		@if ($product->category_id == 1)
                                    <img src="{{asset('images/apple.png')}}" alt="" />
                                    @else
                                    <img src="{{asset('images/orange.png')}}" alt="" />
                                    @endif
                                    <h2>${{$product->price/100}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href='{{url("cart-add/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    <!-- 
                                    <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                    -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection