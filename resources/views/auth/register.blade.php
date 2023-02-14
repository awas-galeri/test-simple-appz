@extends('layouts.main')

@section('content')
    <div class="col-lg-4">
        @include('layouts.alerts')
    </div>

    <div class="boxR">
        <form autocomplete="off" action="{{ url('register') }}" method="POST">
            @csrf
            <h2>Registration</h2>
            <p>Access To Our Dashboard</p>
            <div class="inputBox">
                <input type="text" required="required" name="name" value="{{ old('name') }}">
                <span>Name</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="number" required="required" name="phone" value="{{ old('phone') }}">
                <span>Phone</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="email" value="{{ old('email') }}">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a>Already have an account?</a>
                <a href="{{ url('login') }}">Login</a>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
@endsection

{{-- <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6 fw-bold">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="fw-bold">Register</h3>
                        <p>Join With Us</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="username" required value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name" required value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="example@gmail.com" required value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password"
                                            placeholder="password" required>
                                    </div>
                                </div>
                            </div>
                            <p class="fw-semibold text-center text-muted">Already have an account? <a
                                    href="{{ url('login') }}" class="text-decoration-none">
                                    Login</a></p>
                            <div class="col m-2 text-center">
                                <button type="submit" class="btn btn-secondary fw-bold">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
