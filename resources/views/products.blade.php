<head>

    <title> PRODUCTS</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>


    <style>
        .custom-product-div {
            background-color: #f4f5f5;
            border: 1px solid #e7f5b6;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 2px -3px 6px #88888B;
        }

    </style>
</head>
@include('navbar')

<?php
//use App\Models\Orders;use App\Models\Product;
//use Illuminate\Support\Facades\DB;
//        $products = DB::table('products')->get()
//            $products=Product::get();
//            $orders=Orders::get();
//        $product_quantity = DB::table('products')->where('id',1)->get()->first();
//        echo $product_quantity->quantity;
//         $product_quantity_By_model = Product::getById(1)->quantity;
//        echo $product_quantity_By_model;
//        ?>


<div class="container-fluid">
    <div class="row py-4 d-flex">

        <i class="fa fa-sliders filter " aria-hidden="true"></i>

        <div class="py-2 shadow col-2" id="categories">
            <h5 class="d-flex justify-content-between " >Categories
                  <button class=" btn btn-sm btn-secondary rounded-5 clear"  type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
            </h5>
            @foreach($categories as $category)
                <div class="form-check px-5">
                    <input class="-check-square category-filter"
                           type="checkbox"
                           value="{{ $category->id }}"
                           id="category_{{ $category->id }}" >
                    <label class="form-check-label" for="category_{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>
{{--        <div class="row col-10 product_div " id="product-container">--}}

{{--            @foreach($products as $product)--}}
{{--                <div class="col-md-3 text-center">--}}
{{--                    <div class="custom-product-div">--}}
{{--                        <img src="{{asset('assets/image/'.$product->image)}}" class="img-fluid" alt="Product Image"><br>--}}

{{--                        <p id="product_{{$product->id}}" class="product_name">{{$product->name}}</p>--}}
{{--                        Price: {{$product->price}}--}}
{{--                        <br>--}}
{{--                        Quantity: <span class="product_quantity"> {{$product->quantity}}</span>--}}
{{--                        <br>--}}

{{--                        <button class="btn btn-dark mb-3 w-auto clickHere" type="button">Add To Cart</button>--}}

{{--                        <div class="hidden_items quantity-input" style="display: none;">--}}
{{--                            <button class="fa fa-minus myMinus quantity-input"></button>--}}
{{--                            <input type="text" value="0" class="text-center quantity-input" style="width: 40px;">--}}
{{--                            <button class="fa fa-plus myPlus quantity-input"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

        <div class="row col-10 product_div" id="product-container">
            @include('filter_results', ['products' => $products])
        </div>
        <div class=" col-3 modal ">
            <div class="card " style="height: 100% ;width: 400px;left: 1144px;">
                <div class="card-body">
                    <button type="button" class="close btn-dark"> x</button>
                    <div class="quick-cart__header" style="margin-left: 200px; margin-top: -31px;">
                        <h2 class="quick-cart__heading">
                            Your cart
                        </h2></div>

                    <div class="table ">
                        <h1 id="added_items"></h1>
                        <form method="post" action="{{ route('store') }}" id="save_order_form">
                            @csrf
                            <button type="submit" class=" btn-danger saveOrder"> Save Order</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<br>

<script>
    var ready = $(document).ready(function () {

            $('.category-filter').on('change', function () {
            let selectedCategories = [];

            $('.category-filter:checked').each(function () {
                selectedCategories.push($(this).val());
            });

            $.ajax({
                url: "{{ route('product') }}",
                type: "GET",
                data: {
                    categories: selectedCategories
                },
                success: function (response) {
                    $('#product-container').html(response.html);
                },
                error: function () {
                    alert('Error fetching products.');
                }
            });
        });
        $('.clear').on('click', function () {
            $('input[type="checkbox"]:checked').prop('checked', false).trigger('change');
        });

        $('.filter').click(function () {
            $('#categories').toggleClass('d-none');

            if ($('#categories').hasClass('d-none')) {
                $('#product-container')
                    .removeClass('col-10')
                    .addClass('col-12');
            } else {
                $('#product-container')
                    .removeClass('col-12')
                    .addClass('col-10');
            }
        });



    });

</script>
@include('footer')
