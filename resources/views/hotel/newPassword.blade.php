@extends('hotel.layout')
@section('content')
    <main>
        <div class="forget_password d-flex justify-content-center align-items-center" style="height: 40vh;">

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
                {{-- <form action="{{ route('resetPasswordPost') }}" method="POST" style="width: 30rem;"> --}}
                <form action="{{ route('resetPasswordPost') }}" id="reset" method="POST" style="width: 30rem;">

                    @csrf
                    <input type="text" name="token" hidden value={{ $token }}>
                    <div class="login_input">
                        <input type="email" name="email" id="email" class="w-100 form-control inputs border-2"
                            placeholder="Email address" autocomplete="off">
                    </div>
                    <div class="login_input pt-2">
                        <input type="password" name="password" id="password" class="w-100 form-control inputs border-2"
                            placeholder="Password" autocomplete="off">
                    </div>
                    <div class="login_input pt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-100 form-control inputs border-2" placeholder="Confrimed password" autocomplete="off">
                    </div>
                    <span class="text-danger" id="email-error"></span>
                    <div class="mt-3">
                        <button type="submit" class="rounded-3 p-1 btn btn-outline-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
