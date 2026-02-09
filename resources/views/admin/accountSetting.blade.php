@extends('admin.layout')
@section('content')
    <div class="row d-flex justify-content-center align-items-center m-auto text-light" style="width:1000px; height: 80vh;">
        <div class="row col-sm-12 m-auto" style="width:1100px;">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- @if (session()->has('errors'))
                <div class="alert alert-success">{{ session('errors') }}</div>
            @endif --}}
            <div class="col-sm-12 m-auto"
                style="width:900px; padding:20px; background: rgb(168,0,0);
                    background: linear-gradient(0deg, rgba(168,0,0,1) 60%, rgba(2,0,36,1) 60%);">
                @foreach ($admins as $admin)
                    <form action="{{ route('updateAccount', $admin->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <!-- Image preview -->
                                    <img id="imagePreview" class="image-preview rounded-circle" src="/images/user_profile"
                                        alt="" style="width: 100%; height: 100%; object-fit: cover; display:none;">
                                </div>
                                <button type="button" class="file-upload-btn text-primary mt-1"
                                    onclick="document.getElementById('profile_photo').click()">
                                    Change Profile <i class="fa-solid fa-user"></i>
                                </button>
                            </div>
                        </div>
                        <div class="edit-forms d-flex align-items-center">
                            <div class="row m-auto">
                                <p>
                                    @if ($errors->any())
                                        <div class="bg-white text-danger">

                                            @foreach ($errors->all() as $err)
                                                <ul class="m-auto">
                                                    <li>
                                                        <p>{{ $err }}</p>
                                                    </li>
                                                </ul>
                                            @endforeach

                                        </div>
                                    @endif
                                </p>
                                <div class="col-md-12 m-auto p-3">
                                    <div class="row ">
                                        <div class="col-sm-6 col-md-6">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="name"
                                                value="{{ old('first_name', $admin->first_name) }}"
                                                placeholder="E.g. John Sina"
                                                data-validation-required-message="Please enter your name" />

                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="name"
                                                value="{{ old('last_name', $admin->last_name) }}"
                                                placeholder="E.g. John Sina"
                                                data-validation-required-message="Please enter your name" />
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ old('email', $admin->email) }}"
                                                placeholder="E.g. email@example.com"
                                                data-validation-required-message="Please enter your email" />
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Location</label>
                                            <input type="text" class="form-control" name="location" id="subject"
                                                value="{{ old('location', $admin->location) }}" placeholder="Eg. Yangon"
                                                data-validation-required-message="" />
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="" data-validation-required-message="Please enter your name" />
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <label>Confirmed Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="confirm_password" placeholder=""
                                                data-validation-required-message="Please enter your name" />
                                        </div>

                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="button d-flex">
                                <button type="submit" id="sendMessageButton" class="w-100 text-light border-1 p-1 m-2"
                                    style="background: rgb(2,0,36);
                        background: linear-gradient(40deg, rgba(2,0,36,1) 63%;">Save</button>
                                <a href="{{ route('changePassword', $admin->id) }}" id="sendMessageButton"
                                    class="w-100 text-light text-center border-1 p-1 m-2"
                                    style="background: rgb(2,0,36);
                            background: linear-gradient(40deg, rgba(2,0,36,1) 63%;">Change
                                    Password</a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
