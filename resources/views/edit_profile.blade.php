<head>

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



<form method="post" action="{{ route('update_profile') }}" enctype="multipart/form-data">
    @csrf
    <section class="">
        <div class="container py-5">
            <div class="row d-flex justify-content-center mt-5 mb-3">
                <div class="col-12 mb-4 mb-lg-0">
                    <div class="card" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                                <img id="profilePreview"
                                     src="{{ asset($user_data->profile_image ? 'uploaded-files/user/' . $user_data->profile_image : 'assets/image/default_profile_img.jpg') }}"
                                     alt="Avatar"
                                     class="img-fluid my-3 rounded-circle"
                                     style="width: 130px;" />

                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <input type="file"
                                           name="profile_image"
                                           id="profile_image"
                                           class="form-control form-control-sm w-50"
                                           accept="image/*"
                                           onchange="previewImage(event)">
                                </div>

                                <h5>Name</h5>
                                <input type="text" name="name" class="form-control w-50 mx-auto" value="{{ $user_data->name }}" required>
                            </div>


                        <div class="col-md-8" style="background-color: ghostwhite;">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">

                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <input type="email" name="email" class="form-control" value="{{ $user_data->email }}" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <input type="text" name="phone" class="form-control" value="{{ $user_data->phone }}">
                                        </div>
                                    </div>



                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <input type="text" name="address" class="form-control" value="{{ $user_data->address }}">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <select name="gender" class="form-control">
                                                <option value="Male" {{ $user_data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $user_data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start mt-4">
                                        <a href="https://www.facebook.com"><i class="fa fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="https://x.com"><i class="fa fa-twitter fa-lg me-3"></i></a>
                                        <a href="https://www.instagram.com"><i class="fa fa-instagram fa-lg"></i></a>
                                    </div>

                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-danger text-white border-0 px-5">
                                            <span>Save</span>
                                        </button>
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
</form>





@include('footer')
</body>
