{{-- add a custom css file just for this page --}}
<?php  $styles=['css/order_system_css/orderStylesheet.css']; ?>
{{-- add a custom javascript file from the public folder --}}
<?php  $javascript_local=['js/order_management_script.js','js/jquery-3.4.1.js']; ?>

{{-- CDN Styles and JavaScripts --}}
{{-- add a custom css file from CDN --}}
<?php  $css_cdn=['https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css']; ?>
{{-- add a custom javascript file from a CDN --}}
<?php  $javascript_cdn=['http://code.jquery.com/jquery-1.8.3.min.js','https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js']; ?>

@extends('main.layout.mainlayout', compact('styles', 'css_cdn', 'javascript_local', 'javascript_cdn'));
@section('content')

@section('title', 'Shopping Cart')

<div class="container-fluid">
        <!-- Search bar -->
        <h3 class="display-6 shopping-cart-main-text">Shopping Cart</h3>
        <h1 class="lead shopping-cart-second-text">Product list</h1>

        <div class=" center text-center row d-flex">

                <div class="col-8" style="height: 400px; overflow-x:auto;  ">
                        <table class=" table table-hover table-striped" style=" margin-left: 0% overflow-x:auto;">
                                <thead>
                                        <tr>
                                                <th scope="col">id</th>
                                                <th scope="col" style="width: 200px;">Product</th>
                                                <th scope="col">Unit price</th>
                                                <th scope="col">Discription</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quntity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Action</th>

                                        </tr>
                                </thead>
                                <tbody>

                                        @if(Session::has('cart'))
                                        @foreach ($products as $product )

                                        @if($product['qty']!=0)
                                        <tr>
                                                <td>{{$product['item']['product_id']}}</td>
                                                <td>

                                                        <img src="{{ asset('product_images/'.$product['item']['image']) }}"
                                                                class="product_image" alt=""
                                                                style="width: 50px; height: 80px; box-shadow: 0px 0px 0 5px #f0f0f0;">
                                                        <h6>{{$product['item']['name']}}</h6>

                                                </td>
                                                <td>
                                                        <p style="margin-left: 2%;">Unit price:
                                                                {{$product['item']['selling_price']}} </p>
                                                </td>
                                                <td>
                                                        <p class="limit_discription">{{$product['item']['description']}}
                                                        </p>
                                                </td>
                                                <td>
                                                        {{$product['item']['brand']}}
                                                </td>
                                                <td>
                                                        {{$product['qty']}}
                                                </td>
                                                <td>
                                                        Rs: {{$product['price']}}
                                                </td>
                                                <td>
                                                        <div class="btn-group">
                                                                <a class="btn btn-outline-danger"
                                                                        href="{{route('product.reducedbyone',['id'=>$product['item']['product_id']])}}"
                                                                        role="button">Remove item by 1</a>
                                                        </div>
                                                </td>

                                        </tr>
                                        @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        @endif
                                        @endforeach

                                        @else

                                        @endif
                                </tbody>
                        </table>
                </div>

                <div class="col-4" style="right: 10px; position: absolute;">

                        <div class="card text-left" style=" margin-left: 30%;width: 18rem;">
                                <div class="card-body">
                                        <h5 class="card-title">Order Details</h5>
                                        <div class="row">
                                                <div class="col">
                                                        <h6>Number of Item</h6>
                                                </div>
                                                <div class="col">
                                                        <h6>{{$totalQuntity}}</h6>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                                <div class="col">
                                                        <h6>Delevery to</h6>
                                                </div>
                                                <div class="col">
                                                        <h6>This is address to Colombo </h6>
                                                </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                                <div class="col">
                                                        <h6>Total</h6>
                                                </div>
                                                <div class="col">
                                                        <h4>RS: {{$totalPrice}} </h4>
                                                </div>
                                                <br>
                                                <br>
                                        </div>
                                        <form method="POST" action="">

                                        </form>

                                        @if($product['qty']!=0)
                                        <a href="{{route('product-chek-out')}}" class="btn btn-primary">Check out</a>
                                        @else
                                        <div class="alert alert-warning" role="alert">
                                            Opps!! You'r cart is empty!
                                          </div>
                                        @endif
                                </div>
                        </div>

                </div>

        </div>




</div>

@endsection
