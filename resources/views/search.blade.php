<head>

    <title> search</title>

    <link  href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link  href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

</head>

@include('navbar')







<div class="container">
    <div class="mx-5 py-3">
        <h2>Search Results for "{{ $search_index }}"</h2>
    </div>

    <div class="row py-4">
        <div class="row col-12 product_div" >
            @if($no_products_found==true)
                <p> No Result Found</p>
            @else

            @foreach($results as $result)
                <div class=" col-md-3 text-center">
                    <img src="{{asset('assets/image/'.$result->image)}}" class="img-fluid" alt="Product Image"><br>
                    <p id="product_{{$result->id}}" class="product_name">{{$result->name}}</p>
                    Price: {{$result->price}}<br>
                    Quantity: <span class="product_quantity"> {{$result->quantity}}</span> <br>
                    <button class="btn btn-dark mb-3 w-auto clickHere" type="button">Add To Cart</button>
                    <div class="hidden_items quantity-input" style="display: none;">
                        <button class="fa fa-minus myMinus quantity-input"></button>
                        <input type="text" value="0" class="text-center quantity-input" style="width: 40px;">
                        <button class="fa fa-plus myPlus quantity-input"></button>
                    </div>
                </div>
            @endforeach
            @endif
        </div>

        <div class=" col-3 modal " >
            <div class="card " style="height: 100% ;width: 400px;left: 1112px;">
                <div class="card-body">
                    <button type="button" class="close btn-dark"> x </button>
                    <div class="quick-cart__header" style="margin-left: 200px; margin-top: -31px;">
                        <h2 class="quick-cart__heading" >
                            Your cart
                        </h2></div>

                    <div class="table ">
                        <h1 id="added_items"></h1>
                        <form method="post" action="{{ route('store') }}" id="save_order_form">
                            @csrf
                            <button type="submit" class=" btn-danger saveOrder"> Save Order </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>










@include('footer')
