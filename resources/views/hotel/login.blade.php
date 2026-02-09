@extends('hotel.layout')
@section('content')
    {{-- Start Login Section --}}

    <div class="login_containers d-flex justify-content-center align-item-center p-5">
        <div class="login_forms d-flex align-items-center">
            <div class="row m-auto w-100 p-4">
                <div class="forms col-md-6 m-auto p-3" id="forms">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('error_message'))
                        <div class="alert alert-success">{{ session('error_message') }}</div>
                    @endif
                    <form id="loginForm">
                        @csrf
                        <div>
                            <h3 class="p-0">Hello,</h3>
                            <h1 class="p-0">Welcome!</h1>
                        </div>
                        <div id="errors" class="text-danger text-center w-100"></div>
                        <div class="mb-3">
                            <div class="login_input">
                                <label for="email">Email</label><br>
                                <input type="email" name="email" id="email" class="w-100 form-control inputs"
                                    placeholder="Email" autocomplete="off" required>
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-2">
                            <div class="login_input">
                                <label for="password">Password</label><br>
                                <input type="password" name="password" id="password" class="w-100 form-control inputs"
                                    placeholder="Password" autocomplete="off" required>
                            </div>
                            <span class="text-danger" id="password-error"></span>
                        </div>


                        <div class="form-check form-switch text-end">
                            <a href="{{ route('forgetPassword') }}" class="text-decoration-none">Forgotten password?</a>
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="fw-bold text-uppercase rounded-3 p-1">Login
                                Now</button>
                            <p class="text-center mt-1">If you don't have an account, <a href="{{ route('register') }}"
                                    class="text-decoration-none">Sign Up</a></p>

                        </div>

                    </form>
                </div>
                <div class="col-md-6 m-auto register_images_header">
                    <img src="/images/login_images.jpg" alt="login_images" class="register_images">
                </div>
            </div>
        </div>
    </div>

    <!-- End Login Section -->
@endsection
