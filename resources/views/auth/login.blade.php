@extends('layouts.main')

@section('content')
    <div class="col-lg-4">
        @include('layouts.alerts')
    </div>

    <div class="box">
        <form autocomplete="off" action="{{ url('login') }}" method="POST">
            @csrf
            <h2>Log In</h2>
            <p>Access To Our Dashboard</p>
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
                <a>Don't have an account?</a>
                <a href="{{ url('register') }}">Register</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
@endsection

{{-- <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                @include('layouts.alerts')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="col-lg-4 fw-bold">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="fw-bold">Login</h3>
                            <p>Access To Our Dashboard</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="example@gmail.com" required value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="password" required>
                                </div>
                                <p class="fw-semibold text-center text-muted">Don't have an account? <a
                                        href="{{ url('register') }}" class="text-decoration-none">
                                        Register</a></p>
                                <div class="col m-2 text-center">
                                    <button type="submit" class="btn btn-secondary fw-bold">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
