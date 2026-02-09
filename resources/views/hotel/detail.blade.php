@extends('hotel.layout')
@section('content')
    <!-- Booking Section Start -->
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Message -->
    {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

    <!-- Display Validation Errors -->


    {{-- Booking Detials --}}
    <section class="booking_details_main_section">
        <div class="details-section-header text-center">
            <div>
                <h1 class="display-4">Room Booking</h1>
                <p>
                    The real voyage of discovery consists not in seeking new landscapes, but in having new eyes.
                </p>
            </div>
        </div>
        <div class="main_details_bookings ms-auto me-auto">
            {{-- <div class="booking_details bg-danger"> --}}
            <div class="justify-content-center">
                <div class="booking_details_title pt-4">
                    <h1>{{ $room->room_title }}</h1>
                    <h4>Hotel Room</h4>
                </div>
                <div class="d-flex">
                    {{-- <div class="d-flex justify-content-evenly align-items-center booking_details_section ms-auto me-auto"> --}}
                    <div class="pt-0">
                        {{-- <div class="booking_details_body d-flex justify-content-around align-items-center container m-auto"> --}}
                        <div class="details_img">
                            <img src="/images/{{ $room->image }}" class="card-img-top rounded-0" alt="...">
                            {{-- Description --}}
                            <div class="details_desc pt-5">
                                <h1>Description</h1>
                                <div class="similar_lines mb-4"></div>
                                <p>
                                    {{ $room->description }}
                                </p>
                            </div>
                            {{-- Service --}}
                            <div class="details_service pt-5 bg">
                                <h1>Room Services</h1>
                                <div class="similar_lines mt-1"></div>
                                <div>
                                    <ul class="text-center d-flex align-items-center list-unstyled">
                                        <div class="list-icons">
                                            <li><i class="fas fa-swimming-pool"></i></li>
                                            <p>1 Guests</p>
                                        </div>
                                        <div class="list-icons">
                                            <li><i class="fas fa-tv"></i></li>
                                            <p>1 Guests</p>
                                        </div>
                                        <div class="list-icons">
                                            <li><i class="fas fa-sink"></i></li>
                                            <p>1 Guests</p>
                                        </div>
                                        <div class="list-icons">
                                            <li><i class="fas fa-smoking-ban"></i></li>
                                            <p>No smoking</p>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                    <div class="w-100 ps-4 pe-4">
                        <div class="booking-forms">
                            <form id="bookingForm"
                                action="{{ route('addBooking', ['id' => $room->id, 'price' => $room->price, 'user_id' => $users->email]) }}"
                                method="POST">
                                {{-- <from id="bookingForm" data-bs-toggle="modal" data-bs-target="#payments"> --}}
                                @csrf
                                <div class="">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="booking_input_header">
                                        <div class="booking_input_forms">
                                            <h6>First Name</h6>
                                            <input type="text" name="firstName"
                                                value="{{ old('first_name', auth()->user()->first_name ?? '') }}"
                                                class="form-control" id="firstName" placeholder="E.g. John"
                                                data-validation-required-message="Please enter first name" />
                                            @if ($errors->has('firstName'))
                                                <div class="text-danger">
                                                    {{ $errors->first('firstName') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="booking_input_forms">
                                            <h6>Last Name</h6>
                                            <input type="text" name="lastName"
                                                value="{{ old('last_name', auth()->user()->last_name ?? '') }}"
                                                class="form-control" id="lname" placeholder="E.g. Sina"
                                                data-validation-required-message="Please enter last name" />
                                            @if ($errors->has('lastName'))
                                                <div class="text-danger">
                                                    {{ $errors->first('lastName') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="booking_input_forms">
                                            <h6>Email</h6>
                                            <input type="email" name="email"
                                                value="{{ old('email', auth()->user()->email ?? '') }}"
                                                class="form-control" id="email" placeholder="E.g. email@example.com"
                                                data-validation-required-message="Please enter your email" />
                                            @if ($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="booking_input_forms">
                                            <h6>Mobile</h6>
                                            <input type="text" name="phone" class="form-control" id="mobile"
                                                placeholder="E.g. +1 234 567 8900"
                                                data-validation-required-message="Please enter your mobile number" />
                                            @if ($errors->has('phone'))
                                                <div class="text-danger">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="booking_input_forms">
                                            <h6>Adult</h6>
                                            <input type="number" name="guest" class="form-control" id="guest"
                                                {{-- placeholder="E.g. +1 234 567 8900" --}} value="1" min="0"
                                                data-validation-required-message="Please enter your mobile number" />
                                            @if ($errors->has('guest'))
                                                <div class="text-danger">
                                                    {{ $errors->first('guest') }}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="booking_input_forms">
                                            <div class="calendar" id="calendar" style="display: none;">
                                                <div class="calendar-header">
                                                    <button id="prev-month">&#8249;</button>
                                                    <div class="month-year" id="month-year"></div>
                                                    <button id="next-month">&#8250;</button>
                                                </div>
                                                <div class="calendar-body">
                                                    <div class="calendar-weekdays">
                                                        <div>Sun</div>
                                                        <div>Mon</div>
                                                        <div>Tue</div>
                                                        <div>Wed</div>
                                                        <div>Thu</div>
                                                        <div>Fri</div>
                                                        <div>Sat</div>
                                                    </div>
                                                    <div class="calendar-dates" id="calendar-dates"></div>
                                                </div>
                                            </div>
                                            <div class="date-selection">
                                                <div class="booking_input_forms">
                                                    <h6>Check-In</h6>
                                                    <input type="text" name="checkIn" class="form-control" id="checkIn"
                                                        readonly />
                                                    @if ($errors->has('checkIn'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('checkIn') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="booking_input_forms">
                                                    <h6>Check-Out</h6>
                                                    <input type="text" name="checkOut" class="form-control"
                                                        id="checkOut" readonly />
                                                    @if ($errors->has('checkIn'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('checkIn') }}
                                                        </div>
                                                    @endif
                                                    <span class="text-danger" id="checkOut-error"></span>
                                                </div>
                                            </div>
                                        </div>



                                        {{-- <input type="hidden" name="id" value="{{ $room->id }}"> --}}
                                        <input type="hidden" name="price" value="{{ $room->price }}">
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="w-100 mt-3 book-nows">Book
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <hr class="hr_lines">
        {{-- Similar Room --}}
        <div class="booking_details_section1 d-flex justify-content-center align-items-center m-auto">
            <div>
                <div class="pb-4">
                    <h1 class="p-0 text-center">Similar Rooms</h1>
                </div>
                <div class="row">
                    @foreach ($s_rooms as $room)
                        <div class="col">
                            <div class="card bedrooms text-center">
                                <div class="card-body p-4 mt-3 bed-card-para">
                                    <h2 class="card-title">{{ $room->room_title }}</h2>
                                    <p class="card-text text-justify">{!! Str::limit($room->description, 150) !!}<a
                                            href="{{ route('detail', $room->id) }}">
                                            See
                                            more</a>
                                    </p>
                                    <div class="d-flex booknows">
                                        <p class="m-auto">${{ $room->price }}/Night</p>
                                        <a href="{{ route('detail', $room->id) }}"
                                            class="text-decoration-none ps-2 pe-2 pt-1 pb-1 rounded-4 m-auto">Details
                                            & Book</a>
                                    </div>
                                </div>
                                <div class="bed-card-img">
                                    <a href="#">
                                        <img src="/images/{{ $room->image }}" class="card-img-top rounded-0"
                                            alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Booking Section End -->

    {{-- Start Booking Details Section --}}



    {{-- End Booking Details Section --}}

    {{-- <div class="modal fade" id="payments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="login modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h2>Payment Method</h2>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="javascript:void(0);"><img
                                        src=/assets/img/payment/visacard.png alt="visacard"></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img
                                        src="/assets/img/payment/mastercard.png" alt="matercard"></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img
                                        src="/assets/img/payment/descoverycard.png" alt="descoverycard"></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img
                                        src="/assets/img/payment/card.png" alt="card"></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img
                                        src="/assets/img/payment/americancard.png" alt="matercard"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div> --}}
@endsection
