@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-center align-items-center m-auto" style="width:1000px; height: 80vh;">
        <div class="m-auto" style="width:1100px;">
            <div class="m-auto" style="width:900px;">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('updatePassword', $admins->id) }}" method="POST">
                    @csrf
                    <div class="edit-forms d-flex align-items-center">
                        <div class="m-auto">
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
                            <div class="m-auto p-5 shadow-5 text-light"
                                style="width:500px; background: rgb(168,0,0);
background: linear-gradient(180deg, rgba(168,0,0,1)20%, rgba(2,0,36,1) 20%);">
                                <div class="">
                                    <h3 class="text-light text-center">
                                        <p>Change your password</p>
                                    </h3>
                                    <div class="mt-5">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="" data-validation-required-message="Please enter your name" />
                                    </div>
                                    <div class="mt-3">
                                        <label>Confirmed Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="confirm_password" placeholder=""
                                            data-validation-required-message="Please enter your name" />
                                    </div>
                                    <div class="mt-5">
                                        <div class="button">
                                            <button type="submit" id="sendMessageButton"
                                                class="w-100 text-light border-1 p-1"
                                                style="width:500px; background: rgb(168,0,0);
background: linear-gradient(180deg, rgba(168,0,0,1)20%,">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
