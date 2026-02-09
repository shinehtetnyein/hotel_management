@extends('hotel.layout')

@section('content')
    <div class="container">

        @if ($room->isEmpty())
            <div class="booking-forms">
                <div class="container-fluid booking-list">
                    <div class="text-center">
                        <h2 class="text-center">Available Rooms</h2>
                        <div class="luggage p-3">
                            <img src="/images/luggage.png" alt="">
                        </div>
                        <div class="booking-text text-center">
                            <h4>NO booking yet!</h4>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $room)
                        <tr>
                            {{-- <td><img src="/images/{{ $room->i }}" alt=""></td> --}}
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->price }}</td>
                            <td>Yes</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
