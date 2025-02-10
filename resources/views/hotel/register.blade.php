@extends('hotel.layout')
@section('content')
    <!--Start Banner-->
    <header>
        <div class="banner_images">
            <img src="/images/banner/banner1.jpg" alt="">
        </div>
        <div id="banners" class="banners">
            <div>
                {{-- <h4 class="bannerheaders">Choose</h4> --}}
                <h2 class="bannerbodys h5">Welcome!</h2>
                <p class="lead bannerparagraphs"> Relax, unwind, and let us take care of the rest.</p>
            </div>
        </div>
    </header>
    <!--End Banner-->

    <!-- Start Register Section -->

    <div class="container_register">
        <div class="register_forms d-flex align-items-center">
            <div class="row m-auto">
                <div class="col-md-12 text-center p-4 register-headers">
                    <h3 class="text-uppercase fw-bold p-0 m-0 text-white">Register form</h3>
                </div>
                <div id="message"></div>
                <div id="registerSuccessful" class="alert alert-success" style="display:none;">
                    Regsiter Successful! Please sign in now!
                </div>
                <div id="registerFail" class="alert alert-danger" style="display:none;">
                    Please fill the data completely
                </div>
                <div class="forms col-md-6 m-auto p-3" id="forms">
                    <form id="registerForm" action="{{ route('registerPost') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <div class="d-flex">
                                <i class="fas fa-user input-group-text"></i>
                                <input type="text" name="firstName" id="firstname" class="form-control"
                                    placeholder="First Name">
                            </div>
                            <span class="text-danger" id="firstName-error"></span>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex">
                                <i class="fas fa-user input-group-text"></i>
                                <input type="text" name="lastName" id="lastname" class="form-control"
                                    placeholder="Last Name">
                            </div>
                            <span class="text-danger" id="lastName-error"></span>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex">
                                <i class="fas fa-envelope input-group-text"></i>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Email">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex">
                                <i class="fas fa-key input-group-text"></i>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <span class="text-danger" id="password-error"></span>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex">
                                <i class="fas fa-key input-group-text"></i>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm Password">
                            </div>
                            <span class="text-danger" id="password_confirmation-error"></span>
                        </div>



                        <div class="d-grid mt-4">
                            <button type="submit" class="fw-bold text-uppercase rounded-0 p-2">Register
                                Now</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-6 m-auto register_images_header">
                    <img src="/images/review.jpg" alt="register_image.jpg" class="register_images">
                </div>
            </div>
        </div>
    </div>

    <!-- End Register Section -->
@endsection
