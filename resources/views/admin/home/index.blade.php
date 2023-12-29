@extends('layouts.admin')

@section('title', $viewData['title'])

<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto">
        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
        <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
        <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
        <a class="nav-link active" href="{{ route('home.about') }}">About</a>
        @guest
            <a class="nav-link active" href="{{ route('login') }}">Login</a>
            <a class="nav-link active" href="{{ route('register') }}">Register</a>
        @else
            <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
            @if (Auth::user()->role == 'admin')
                <a class="nav-link active" href="{{ route('admin.home.index') }}">Dashboard</a>
            @endif
            <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="nav-link active"
                    onclick="document.getElementById('logout').submit();">Logout</a>
                @csrf
            </form>
        @endguest
    </div>
</div>

@section('content')

    <div class="card">
        <div class="card-header"> Admin Panel - Home Page
        </div>
        <div class="card-body">
            Welcome to the Admin Panel, use the sidebar to navigate between the different options.
        </div>
    </div>

@endsection
