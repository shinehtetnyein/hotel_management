@extends('admin.layout')
@section('content')
    <div class="table-responsive">
        <table class="table text-center">
            <thead style="background: rgb(161, 1, 1);">
                <tr class="text-light d-flex justify-content-between align-items-center border-0 p-5 ps-0 pt-0 pb-0">
                    <th scope="col" style="width: 230px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Room</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Name</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">phone No</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Check In</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Check Out</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">guest</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">price</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Status</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">More</th>
                </tr>
            </thead>
            <tbody class="admin_booking_section" style="background: rgba(2,0,36,1);">
                @foreach ($booking as $b)
                    <tr style="height: 150px;"
                        class="d-flex justify-content-between align-items-center border-1 border-light p-5 ps-0">
                        <td style="width:230px;" class="p-1 border-0">
                            <img src="/images/{{ $b->image }}" alt="$r->image">
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->first_name . ' ' . $b->last_name }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->ph_no }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->check_in }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->check_out }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->guest }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->price }}</p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p style="color:rgb(226, 0, 0);" class="text-uppercase">
                                {{ $b->status }}
                            </p>
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <a href="{{ route('bookedDelete', $b->id) }}"
                                style="background-color: rgb(188, 0, 0); padding:8px 18px; border-radius:10px; color:white;"
                                class="text-uppercase d-block">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <h2 class="p-3">
            {{ $booking->links('') }}
        </h2>
    </div>
@endsection
