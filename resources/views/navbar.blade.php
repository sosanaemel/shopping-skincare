<body>
<nav class="navbar border-bottom" >
    <div class="container-fluid">


        <div class="d-flex align-items-center">
            <a class="navbar-brand me-4" href="{{ route('home') }}">
                <img class="mb-1" style="width: 50px;" src="{{ asset('assets/image/download-removebg-preview.png') }}">
            </a>
            <div class="d-flex gap-3">
                <a class="text-decoration-none text-dark" href="{{ route('home') }}">Home</a>
                <a class="text-decoration-none text-dark" href="{{ route('product') }}">Product</a>
                <a class="text-decoration-none text-dark" href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>

        <div class="col-md-4">
            <form method="POST" action="{{ route('search_page') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Search our product">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center gap-3 mx-5">
            @if(!auth()->user())
            <a href="{{ route('register') }}">
                <i class="fa fa-user"></i>
            </a>
            @endif
             @if(!auth()->user())
                <a href="{{ route('profile') }}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </a>
                @else
                    <a href="{{ route('profile') }}">
                 <img src="{{ asset(auth()->user()->profile_image ? 'uploaded-files/user/'.auth()->user()->profile_image : 'assets/image/default_profile_img.jpg') }}" class="img-fluid rounded-circle " style="width: 33px; height: 33px;">
                    </a>


                @endif
            @if(auth()->user())
                <a href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i>
                </a>
            @endif

            <a href="#" class="fa fa-shopping-cart nav-link position-relative " id="shopping_cart">
                <span class="badge rounded-pill bg-secondary position-absolute mb-2 start-100 translate-middle gap-2" style="top: 15px;" id="cart_count">0</span>
            </a>
        </div>
    </div>
</nav>
</body>
