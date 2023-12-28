<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @notifyCss
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-info">
            {{-- header and NavBar --}}
            <div class="col-lg-2 col-md-3 col-sm-0 text-white">
                <span class="fs-2">
                    Online Store
                </span>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-0 p-0 text-end">
                {{-- <span class="fs-3 text-white">Online Store</span> --}}
                <nav class="p-2 shadow text-end">
                    @guest
                        <a href="{{ route('login') }}" class="nav-link active">Login</a>
                        <a href="{{ route('register') }}" class="nav-link active">Register</a>
                    @else
                        <img class="img-profile rounded-circle float-right" src="{{ asset('/img/oip.jpg') }}"
                            style="float: right;" alt="">
                            <figcaption><span class="fs-3  text-white">Admin</span></figcaption>
                        <form action="{{ route('logout') }}" id="logout" method="POST">
                            <a role="button" class="nav-link active text-white"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                            @csrf
                        </form>
                    @endguest
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            </div>
            {{-- middle area container container and left sidebar --}}
            <div class="col-lg-2 col-md-3 col-sm-0 text-white bg-dark" style="min-height: 101%">
                {{-- left side bar --}}
                <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                    <span class="fs-4">Admin Panel</span>
                </a>
                <hr />
                <ul class="nav flex-column sidebar">
                    <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- Admin - Home</a></li>
                    <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- Admin - Products</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.home.index') }}" class="mt-2 btn bg-primary text-white">Go back to the
                            home page</a>
                    </li>
                </ul>
                <br><br><br>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-12 py-2" style="margin-bottom: 15%; min-height: 99%">
                {{-- main-content --}}
                <div class="container-fluid">
                    <div class="row my-2 bg-light">
                        <div class="col-md-6 text-alig-center ">
                            <h3>@yield('innerTitle')</h3>
                        </div>
                        <div class="col-md-6 text-alig-right ">
                            <h4>@yield('breadCrumb')</h4>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="col-12 alert alert-warning alert-dismissible">
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <br><br>
        <div style="clear: both"></div>
        <div class="row">
            {{-- footer location --}}
            <div class="copyright py-4 text-center text-white">
                <div class="container">
                    <small>
                        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                            href="https://twitter.com/user">
                            XYZ Company
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
    {{-- include JS file here --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    @notifyJs
    @include('notify::components.notify')
</body>

</html>
