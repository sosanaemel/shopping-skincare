<!DOCTYPE html>
<html lang="en">

<head>
    <title>HOME</title>

    <link  href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link  href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>


    <style>
        .background-image{
            background-color: white;
            background-repeat: no-repeat;
            background-size: cover;
        }
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body{
            font-family: 'Poppins' ,sans-serif;
        }
        .carousel-caption{
            bottom: 50%;
            transform: translate(0,50%);
        }
        .carousel-caption h5{
            font-size: 1rem;
            font-weight: 700;
            color: white;
        }
        @media  (min-width: 992px){
            .carousel-caption h5{
                font-size: 4rem;
            }
        }

    </style>

</head>

<body>


@include('navbar')

    <div class=" background-image container-fluid text-center m-0 " style="padding-bottom: 10%;">

        <div class=" display-1 text-dark mt-2 mb-5 ">
            <p> Welcome To Store </p>



        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active  " aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/image/1.webp') }}" class=" w-75" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/image/1.webp') }}" class="  w-75" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/image/1.webp') }}" class="  w-75" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev  " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
                <span class="visually-hidden bg-secondary">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
                <span class="visually-hidden bg-secondary">Next</span>
            </button>
        </div>
        </div>



        <div class=" container">
            <div class=" row" style="background-color:#f4f5f5;width: 95%;justify-self: anchor-center;">
            <div class="col-sm-12 col-xl-6" >
                <img src="{{ asset('assets/image/WechatIMG676_95c35ad0-c5d5-4d88-8c9d-2d9deb70e903.webp') }}" class=""  alt="...">
            </div>
                    <div class="col-sm-12 col-xl-6 p-3">
                        <h2 >Sun-Damaged Skin</h2>
                        <h5 style="text-align: left">Everyone is at risk of the effects of sun exposure. It doesn’t matter how old you are or what color your skin is.
                            Your risk increases based on the length and depth of exposure.
                            Too much sun exposure allows UV rays to reach your inner skin layers.
                            This can cause skin cells to die, damage, or develop cancer<br>
                            Signs of sunburn include: <br>
                            – Redness. <br>
                            -Your skin will turn red due to an increase in blood flow.<br>
                            -Hot skin.<br>
                            -You also can get goose bumps or chills.<br>
                            -Pain.<br>
                            -Itchy or tight skin.<br>
                            -Blisters.<br>
                            -Dehydration.<br>
                            -Peeling. <br>
                            -This is your body’s way of shedding the dead cells.</h5>

                            <a  href="{{route('product')}}">
                                <button class="btn btn-secondary mb-2 w-auto  " style="border-radius: 30px" type="button">Show Product</button>
                            </a>
                    </div>
            </div>
        </div>
    </div>



@include('footer')
</body>
</html>
