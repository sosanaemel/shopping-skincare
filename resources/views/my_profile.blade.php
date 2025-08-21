<head>
    <title>MyProfile</title>

    <link  href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" type="text/css" rel="stylesheet">
    <link  href="{{ asset('assets/css/bootstrap.css') }}" media="all" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fa/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/fa/css/font-awesome.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <style>
        .gradient-custom {
            background: #f6d365;
            background: linear-gradient(to right bottom, rgb(195 195 195), rgb(65 74 123))
        }
    </style>
</head>
<body>
@include('navbar')
<section class="" >
    <div class="container py-5">
        <div class="row d-flex justify-content-center mt-5 mb-3">
            <div class="col-12 mb-4 mb-lg-0">
                <div class="card " style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="{{ asset($user_data->profile_image ? 'uploaded-files/user/'.$user_data->profile_image : 'assets/image/default_profile_img.jpg') }}"
                                 alt="Avatar" class="img-fluid my-5 rounded-circle " style="width: 130px;" />
                            <h3>{{ $user_data->name }}</h3>
                        </div>
                        <div class="col-md-8" style="background-color: ghostwhite;">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $user_data->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{ $user_data->phone }}</p>
                                    </div>
                                </div>

                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Address</h6>
                                        <p class="text-muted">{{ $user_data->address }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted">{{ $user_data->gender }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="https://www.facebook.com"><i class="fa fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="https://x"><i class="fa fa-twitter fa-lg me-3"></i></a>
                                    <a href="https://www.instagram.com"><i class="fa fa-instagram fa-lg"></i></a>
                                    <a href="{{ route('edit') }}" class="btn btn-danger mt-5 text-white border-0 px-5">
                                        <span> Edit</span>

                                    </a>
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
</section>
@include('footer')
</body>
