@extends('hotel.layout')
@section('content')
    <div class="booking-forms">
        <div id="success"></div>
        <form id="bookingForm"
            action="{{ route('stripe', ['id' => $room->id, 'price' => $room->price, 'user_id' => auth()->user()->email]) }}"
            method="POST">
            @csrf
            <div class="container-fluid booking-list">
                <div class="text-center">
                    <div class="luggage p-3">
                        <img src="/images/{{ $room->image }}" alt="">
                    </div>
                    <div class="booking-text text-center">
                        <h4>Your Email:{{ auth()->user()->email }}</h4>
                    </div>
                    <div class="booking-text text-center">
                        <h3>Price:{{ $room->price }}</h3>
                        <h5>To make your booking successfully, Please click Payment</h5>
                    </div>
                    <div>
                        <input type="hidden" name="price" value="{{ $room->price }}">
                        <button type="submit" class="btn btn-primary">Start Payment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
