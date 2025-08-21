
<head>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>


    <style>
    @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);
    .contact3 {
    font-family: "Montserrat", sans-serif;
    color: #8d97ad;
    font-weight: 300;
    }

    .contact3 h1,
    .contact3 h2,
    .contact3 h3,
    .contact3 h4,
    .contact3 h5,
    .contact3 h6 {
    color: #3e4555;
    }

    .contact3 .font-weight-medium {
    font-weight: 500;
    }

    .contact3 .card-shadow {
    -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
    box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
    }

    .contact3 .btn-danger-gradiant {
    background: #ff4d7e;
    background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
    background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
    background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
    background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
    background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
    }

    .contact3 .btn-danger-gradiant:hover {
    background: #ff6a5b;
    background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
    background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
    background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
    background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
    background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }
    </style>
</head>
@include('navbar')
<h1 class="text-center mt-2 card-header ">Quick Contact</h1>

<div class="contact3 py-5 card-body container">
    <div class="row no-gutters">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-shadow">
                        <img src="https://images.unsplash.com/photo-1598257006458-087169a1f08d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw0fHxjYWxsfGVufDB8MHx8fDE3MjEwMzg4OTV8MA&ixlib=rb-4.0.3&q=80&w=1080" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="contact-box ml-3">
                        <form class="mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="text" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="email" placeholder="email address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input class="form-control" type="text" placeholder="phone">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" placeholder="message" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-danger-gradiant mt-3 text-white border-0 px-3 py-2"><span> SUBMIT</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mt-4 border-0 mb-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="card-body d-flex align-items-center c-detail pl-0">
                                    <div class="align-self-center p-4">
                                        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon1.png">
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-medium">Address</h6>
                                        <p class=""> <strong>EEC Tower </strong> <br>
                                             Sheraton Heliopolis</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card-body d-flex align-items-center c-detail">
                                    <div class="align-self-center p-4">
                                        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon2.png">
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-medium">Phone</h6>
                                        <p class="">251 546 9442
                                            <br> 630 446 8851</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card-body d-flex align-items-center c-detail">
                                    <div class=" align-self-center p-4">
                                        <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon3.png">
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-medium">Email</h6>
                                        <p class="">
                                            info@wrappixel.com
                                            <br> 123@wrappixel.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
