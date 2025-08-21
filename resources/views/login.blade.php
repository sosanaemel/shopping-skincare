<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/fa/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fa/css/font-awesome.css') }}">

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
@include('navbar')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6 col-lg-5 border rounded shadow p-4 bg-white">
        <h3 class="text-center mb-4">Login</h3>

        {{-- Show general login error (e.g., wrong email/password) --}}
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        {{-- Show validation errors (empty fields, bad format, etc.) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('login_data') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="mb-3 text-end">
                <a href="{{ route('register') }}">Create Account</a>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-secondary w-50">Login</button>
            </div>
        </form>
    </div>
</div>

@include('footer')
</body>
</html>
