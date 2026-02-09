@extends('hotel.layout')
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap text-center">
            <thead style="background: rgb(161, 1, 1);" class="border-1">
                <tr class="text-light d-flex justify-content-between align-items-center border-0">
                    <th scope="col" style="width: 250px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">
                        Room</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Name</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        phone No
                    </th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Check In
                    </th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Check
                        Out</th>
                    <th scope="col" style="width: 90px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        guest
                    </th>
                    <th scope="col" style="width: 90px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        price
                    </th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Status
                    </th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        More
                    </th>
                </tr>
            </thead>
            <tbody class="admin_booking_section" style="background: rgba(2,0,36,1);">
                @foreach ($booking as $b)
                    <tr style="height: 150px;"
                        class="d-flex justify-content-between align-items-center border-1 border-light">
                        <td style="width:250px; font-size:15px;" class="p-3 ps-1 m-0 border-0">
                            <img src="/images/{{ $b->image }}" alt="$r->image">
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->first_name . ' ' . $b->last_name }}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->ph_no }}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->check_in }}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->check_out }}</p>
                        </td>
                        <td style="width: 90px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->guest }}</p>
                        </td>
                        <td style="width: 90px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $b->price }}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <button style="background-color: rgb(3, 163, 203); padding:10px 20px; color:white;"
                                class="text-uppercase border-0">
                                {{ $b->status }}
                            </button>
                        </td>
                        <td style="width: 110px;" class="dropdowns border-0" style="width: 100px;">
                            <div class="dropdown">
                                <button data-bs-toggle="dropdown" class="h3 text-light bg-transparent border-0">
                                    ...
                                </button>
                                <ul class="list-unstyled dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('approve', $b->id) }}">Approve</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('reject', $b->id) }}">Reject</a></li>
                                </ul>
                            </div>
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
