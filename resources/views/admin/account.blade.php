@extends('admin.Layout')
@section('content')
    <!-- Start Register Section -->
    @if ($errors->any())
        <div class="alert alert-warning text-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row login_containers d-flex justify-content-center align-item-center p-5" style="margin-top: 40px;">
        <div class="col-sm-12 login_forms d-flex align-items-center rounded-3">
            <div class="row m-auto w-100 p-4">
                <div class="forms col-md-6 m-auto p-3" id="forms">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error_message'))
                        <div class="alert alert-success">{{ session('error_message') }}</div>
                    @endif
                    <form action="{{ route('addAdmin') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <h4 class="p-0">Hello,</h4>
                            <h1 class="p-0">Welcome!</h1>
                        </div>
                        <div id="errors" class="text-danger text-center w-100"></div>

                        <div class="mb-3">
                            <div class="login_input">
                                <label for="first_name">First Name</label><br>
                                <input type="text" name="first_name" id="first_name" class="w-100 form-control "
                                    placeholder="First Name" autocomplete="off">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-3">
                            <div class="login_input">
                                <label for="last_name`">Last Name</label><br>
                                <input type="text" name="last_name" id="last_name" class="w-100 form-control "
                                    placeholder="Last Name" autocomplete="off">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-3">
                            <div class="login_input">
                                <label for="email`">Email</label><br>
                                <input type="email" name="email" id="email" class="w-100 form-control "
                                    placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="login_input">
                                <label for="password`">Password</label><br>
                                <input type="password" name="password" id="password" class="w-100 form-control "
                                    placeholder="Password" autocomplete="off">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-3">
                            <div class="login_input">
                                <label for="password_confirmation`">Confirm Password</label><br>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-100 form-control " placeholder="Confirm Password" autocomplete="off">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="fw-bold text-uppercase rounded-3 p-1">Register
                                Now</button>
                            {{-- <p class="text-center mt-1">If you already have account, <a href="{{ route('index') }}"
                                    class="text-decoration-none">Sign In</a></p> --}}
                        </div>

                    </form>
                </div>
                <div class="col-md-6 m-auto register_images_header">
                    <img src="/images/admin.jpg" alt="admin.jpg" class="register_images">
                </div>
            </div>
        </div>
    </div>

    <!-- End Register Section -->
@endsection
