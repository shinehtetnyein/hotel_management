@extends('admin.layout')
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap text-center">
            <thead style="background: rgb(161, 1, 1);" class="border-1">
                <tr class="text-light d-flex justify-content-between align-items-center border-0 p-5 ps-0 pt-0 pb-0">
                    <th scope="col" style="width: 250px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">
                        Room</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center align-items-center border-0">Room Title</th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Room Type
                    </th>
                    <th scope="col" style="width: 50px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Facilities
                    </th>
                    <th scope="col" style="width: 110px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        Price</th>
                    <th scope="col" style="width: 50px;"
                        class="text-light d-flex justify-content-center
                        align-items-center border-0">
                        More
                    </th>
                </tr>
            </thead>
            <tbody class="admin_booking_section" style="background: rgba(2,0,36,1);">
                @foreach ($rooms as $r)
                    <tr style="height: 150px;"
                        class="d-flex justify-content-between align-items-center border-1 border-light p-5 ps-0">
                        <td style="width:240px; height:140px; font-size:15px;" class="p-0 m-0 ps-1 m-0 border-0">
                            <img src="/images/{{ $r->image }}" alt="$r->image" style="width:100%; height:100%;">
                        </td>
                        <td style="width: 110px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $r->room_title }}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $r->room_type }}</p>
                        </td>
                        <td style="width: 50px; font-size:15px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{!! Str::limit($r->facilities, 15) !!}</p>
                        </td>
                        <td style="width: 110px;"
                            class="text-light d-flex justify-content-center align-items-center border-0">
                            <p>{{ $r->price }}</p>
                        </td>
                        <td style="width: 50px;"
                            class="text-light d-flex justify-content-center align-items-center border-0"
                            class="dropdowns text-light" style="width: 100px;">
                            <div class="dropdown">
                                <button data-bs-toggle="dropdown" class="h3 mb-3 text-light bg-transparent">
                                    ...
                                </button>
                                <ul class="list-unstyle dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('edit', $r->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('roomDelete', $r->id) }}">Delete</a></li>
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
            {{ $rooms->links('') }}
        </h2>
    </div>
@endsection
