@foreach($products as $product)
    <div class="col-md-3 text-center">
        <div class="custom-product-div">
            <img src="{{ asset('assets/image/'.$product->image) }}" class="img-fluid" alt="Product Image"><br>
            <p id="product_{{ $product->id }}" class="product_name">{{ $product->name }}</p>
            Price: {{ $product->price }} <br>
            Quantity: <span class="product_quantity">{{ $product->quantity }}</span> <br>
            @if(auth()->user())
                <button class="btn btn-dark mb-3 w-auto clickHere" type="button">Add To Cart</button>
            @else
                <a class="btn btn-dark mb-3 w-auto" href="{{route('login')}}" type="button">Add To Cart</a>
            @endif
            <div class="hidden_items quantity-input" style="display: none;">
                <button class="fa fa-minus myMinus quantity-input"></button>
                <input type="text" value="0" class="text-center quantity-input" style="width: 40px;">
                <button class="fa fa-plus myPlus quantity-input"></button>
            </div>
        </div>
    </div>
@endforeach

@if($products->isEmpty())
    <div class="col-12 text-center">
        <p>No products found for the selected categories.</p>
    </div>
@endif
