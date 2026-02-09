@extends('hotel.layout')

@section('content')
    <div class="container">

        @if ($rooms->isEmpty())
            <div class="booking-forms">
                <div class="container-fluid booking-list">
                    <div class="text-center">
                        <h2 class="text-center">Available Rooms</h2>
                        <div class="luggage p-3">
                            <img src="/images/luggage.png" alt="">
                        </div>
                        <div class="booking-text text-center">
                            <h4>NO avaliable room for your selected date</h4>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-nowrap text-center">
                    <thead style="background: rgb(161, 1, 1);" class="border-1">
                        <tr
                            class="text-light d-flex justify-content-between align-items-center border-0 p-5 ps-0 pt-0 pb-0">
                            <th scope="col" style="width: 220px"
                                class="text-light bg-transparent d-flex justify-content-center align-items-center border-0">
                                Room</th>
                            <th scope="col" style="width: 100px;"
                                class="text-light bg-transparent d-flex justify-content-center align-items-center border-0">
                                Room Title</th>
                            <th scope="col" style="width: 100px;"
                                class="text-light bg-transparent d-flex justify-content-center
                            align-items-center border-0">
                                Room Type
                            </th>
                            <th scope="col" style="width: 100px;"
                                class="text-light bg-transparent d-flex justify-content-center
                            align-items-center border-0">
                                Facilities
                            </th>
                            <th scope="col" style="width: 100px;"
                                class="text-light bg-transparent d-flex justify-content-center
                            align-items-center border-0">
                                Price</th>
                            <th scope="col" style="width: 100px;"
                                class="text-light bg-transparent d-flex justify-content-center
                            align-items-center border-0">
                                More
                            </th>
                        </tr>
                    </thead>
                    <tbody class="admin_booking_section" style="background: rgba(2,0,36,1);">
                        @foreach ($rooms as $r)
                            <tr style="height: 150px;"
                                class="d-flex justify-content-between align-items-center border-1 border-light p-5 ps-0">
                                <td style="width:220px; height:140px; font-size:15px;"
                                    class="p-0 m-0 ps-1 m-0 border-0 bg-transparent">
                                    <img src="/images/{{ $r->image }}" alt="$r->image" style="width:100%; height:100%;">
                                </td>
                                <td style="width: 100px; font-size:15px;"
                                    class="text-light mt-auto border-0 bg-transparent">
                                    <p>{{ $r->room_title }}</p>
                                </td>
                                <td style="width: 100px;" class="text-light mt-auto border-0 bg-transparent">
                                    <p>{{ $r->room_type }}</p>
                                </td>
                                <td style="width: 100px; font-size:15px;"
                                    class="text-light mt-auto border-0 bg-transparent">
                                    <p>{!! Str::limit($r->facilities, 15) !!}</p>
                                </td>
                                <td style="width: 100px;" class="text-light mt-auto border-0 bg-transparent">
                                    <p>{{ $r->price }}</p>
                                </td>
                                <td style="width: 100px; font-size:15px;"
                                    class="text-light d-flex justify-content-center align-items-center border-0 bg-transparent">
                                    <a href="{{ route('detail', $r->id) }}"
                                        style="background-color: rgb(188, 0, 0); padding:5px 20px; border-radius:10px; color:white;"
                                        class="d-block text-decoration-none">
                                        Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="d-flex justify-content-center mt-3">
            <h2 class="p-3">
                {{ $rooms->links('') }}
            </h2>
        </div>
    </div>
@endsection
