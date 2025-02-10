@extends('hotel.layout')
@section('content')
    <main>
        <div class="forget_password d-flex justify-content-center align-items-center" style="height: 40vh;">
            <form action="{{ route('forgetPasswordPost') }}" method="POST" style="width: 30rem;">
                @csrf
                <div class="mb-3">
                    <div>
                        @if ($errors->any())
                            <div class="col-12">
                                @foreach ($errors->all() as $err)
                                    <div class="alert alert-danger">{{ $err }}</div>
                                @endforeach
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div class="text-center">
                        <p>"We will send a link to your email, use that link to reset password."</p>
                    </div>
                    <div class="login_input">
                        <input type="email" name="email" id="email" class="w-100 form-control inputs border-2"
                            placeholder="Email address" autocomplete="off">
                    </div>
                    <span class="text-danger" id="email-error"></span>
                </div>
                <div>
                    <button type="submit" class="rounded-3 p-1 btn btn-outline-dark">Submit</button>
                </div>
            </form>
        </div>
    </main>
@endsection
