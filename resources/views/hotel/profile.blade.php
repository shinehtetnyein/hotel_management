@extends('hotel.layout')
@section('content')
    {{-- <form action="{{ route('profileCover') }}" method="POST" enctype="multipart/form-data"> --}}
    {{-- <div class="profile-covers">
            <div class="file-upload">
                <button class="file-upload-btn"><i class="fas fa-image"></i> Add cover
                    photo</button>
                <input type="file" class="form-control-file" name="cover_photo" id="cover_photo">
            </div>
            <img id="imagePreview" class="image-preview" src="#" alt="Image Preview" style="display: none;">
        </div> --}}
    @if (session()->has('error'))
        <div class="alert alert-success">{{ session('error') }}</div>
    @endif

    <div class="profiles p-3">
        <div class="profile-group">
            <div class="profile-banner">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="profileImages">
                            <img src="/images/user_profile/{{ $user->profile_photo }}" alt="" class="rounded-circle">
                        </div>
                        <div class="ms-2 mt-auto w-100">
                            <h5 class="w-100">{{ $user->first_name }}</h5>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="me-5">
                        <button type="button" class="btn btn-outline-dark text-light" data-bs-toggle="modal"
                            data-bs-target="#profiles">Edit
                            Profile</button>
                    </div>
                </div>
            </div>
            <div class="row profile-group1 p-3">
                <div class="col-md-2 nav flex-column">
                    <p class="vertical-menu"></p>
                    <a class="nav-link border-2 border-bottom" href="{{ route('review') }}">Write a review</a>
                    <a class="nav-link border-2 border-bottom" href="{{ route('booking') }}">Booking</a>
                    <a class="nav-link border-2 border-bottom mb-3" href="{{ route('logout') }}" aria-disabled="true">Sign
                        Out</a>

                    <a href="#" class="nav-link pe-0 border-2" data-bs-toggle="modal" data-bs-target="#profiles">
                        <p class="border-2"><i class="fas fa-thumbtack"></i>
                            {{ $user->first_name ? $user->first_name : '+ Add your First Name' }}
                        </p>
                    </a>


                    <a href="#" class="nav-link pe-0 border-2" data-bs-toggle="modal" data-bs-target="#profiles">
                        <p class="border-2"><i class="fas fa-thumbtack"></i>
                            {{ $user->last_name ? $user->last_name : '+ Add your Last Name' }}
                        </p>
                    </a>

                    <a href="#" class="nav-link pe-0 pt-0" data-bs-toggle="modal" data-bs-target="#profiles">
                        <p><i class="fas fa-thumbtack"></i> {{ $user->email ? $user->email : '+ Add your email' }}</p>
                    </a>


                    <a href="#" class="nav-link pe-0 pt-0" data-bs-toggle="modal" data-bs-target="#profiles">
                        <p><i class="fas fa-thumbtack"></i> {{ $user->location ? $user->location : '+ Add your location' }}
                        </p>
                    </a>


                    @if (Auth::user())
                        <a href="#" class="nav-link pe-0 pt-0" data-bs-toggle="modal" data-bs-target="#profiles">
                            <p><i class="fas fa-thumbtack"></i>
                                {{ $user->location ? $user->about : '+ Add your info' }}
                            </p>
                        </a>
                    @else
                        <a href="#" class="nav-link pe-0 pt-0" data-bs-toggle="modal" data-bs-target="#profiles">
                            <p class="d-flex"><i class="fas fa-thumbtack"></i>
                                <textarea name="" id="scrollableTextarea" cols="30" rows="10">
                                {{ $user->about ? $user->about : '+ Write some details about yourself' }}
                            </textarea>
                            </p>
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="profiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="login modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="file-upload w-100 d-flex justify-content-center p-3">
                            <div class="">
                                <div class="rounded-circle border border-3 edit_profiles_header m-auto"
                                    style="width:100px; height:100px; position: relative;">
                                    <div id="iconContainer" class="edit_profiles">
                                        <!-- Button to trigger file input -->
                                        <!-- Hidden file input -->
                                        <input type="file" class="form-control-file" name="profile_photo"
                                            id="profile_photo" style="display: none;" onchange="previewImage(event)">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <!-- Image preview -->
                                    <img id="imagePreview" class="image-preview rounded-circle" src="/images/user_profile"
                                        alt="" style="width: 100%; height: 100%; object-fit: cover; display:none;">
                                </div>
                                <button type="button" class="file-upload-btn text-primary mt-1"
                                    onclick="document.getElementById('profile_photo').click()">
                                    Change Profile <i class="fas fa-user-edit"></i>
                                </button>
                            </div>
                        </div>
                        <div class="edit-forms d-flex align-items-center">
                            <div class="row m-auto">
                                <div class="col-md-12 m-auto p-3">
                                    <div class="row ">
                                        <div class="col-sm-6 col-md-6">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control profile_inputs"
                                                id="fname" value="{{ old('first_name', $user->first_name) }}"
                                                placeholder="E.g. John Sina" required="required"
                                                data-validation-required-message="Please enter your name" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control profile_inputs"
                                                id="lname" value="{{ old('last_name', $user->last_name) }}"
                                                placeholder="E.g. John Sina" required="required"
                                                data-validation-required-message="Please enter your name" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control profile_inputs" name="email"
                                                id="email" value="{{ old('email', $user->email) }}"
                                                placeholder="E.g. email@example.com" required="required"
                                                data-validation-required-message="Please enter your email" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Location</label>
                                            <input type="text" class="form-control profile_inputs" name="location"
                                                id="subject" value="{{ old('location', $user->location) }}"
                                                placeholder="Eg. Yangon" required="required"
                                                data-validation-required-message="" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label>About you</label>
                                        <textarea class="form-control profile_inputs" name="about" id="message" rows="5"
                                            placeholder="Write some details about yourself" required="required"
                                            data-validation-required-message="Write some details about yourself"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-0">
                            {{-- <buttont type="reset" id="cancelProfile" class="book-nows w-100 me-3">Cancel</buttont> --}}
                            <button type="submit" id="sendMessageButton" class="book-nows w-100">Save</button>
                        </div>
                    </form>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
@endsection
