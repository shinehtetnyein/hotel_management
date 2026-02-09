@extends('hotel.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- fav icon-->
        <link href="/assets/img/fav/favicon3.png" rel="icon" type="image/png" sizes="16x16" />

        <!-- bootstrap css1 & js1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!--magnific popup css1 js1-->
        <link href="./assets/libs/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet" type="text/css" />

        <!-- jQuery css1 js1 -->
        <link href="./assets/libs/jquery-ui-1.13.1/jquery-ui.min.css" rel="stylesheet" type="text/css">

        <!-- lightslider css1 js1 -->
        <link href="./assets/libs/lightslider-master/dist/css/lightslider.min.css" rel="stylesheet" type="text/css" />

        <!-- custom css  -->
        <link href="./style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <header class="main_header row">
            <!--Start Banner-->
            <div class="container-fluid col-sm-12">
                <div id="banners" class="main_banners">
                    <div>

                    </div>
                    <div>
                        <h4 class="m_bannerheaders">Welcome to</h4>
                        <h1 class="m_bannerbodys">Grand Hotel</h1>
                        <p class="lead m_bannerparagraphs"> A place to experience and enjoy the life</p>
                    </div>
                </div>
            </div>
            <!--End Banner-->
        </header>
        <!--End Header-->

        <!-- Start Booking Section  -->
        <section id="booking" class="search-rooms">
            @if ($errors->any())
                <div class="alert alert-danger text-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('search') }}" method="GET" class="container-fluid">
                <div class="text-center">
                    <h4 class="p-1 mt-3 titles text-white">Check Availability</h4>
                </div>
                <div class="d-flex justify-content-betwen check-rooms text-light">
                    <div class="booking_input_forms row">
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
                        <div class="col-md-12 d-lg-flex date-selection justify-content-around ms-lg-5 ">
                            <div class="col-sm-3 booking_input_forms col-lg-3">
                                <h6>Check-In</h6>
                                <input type="text" name="checkin" class="form-control" id="checkIn" readonly />
                                <span class="text-danger" id="checkIn-error"></span>
                            </div>
                            <div class="col-lg-3 col-sm-3 booking_input_forms">
                                <h6>Check-Out</h6>
                                <input type="text" name="checkout" class="form-control" id="checkOut" readonly />
                                <span class="text-danger" id="checkOut-error"></span>
                            </div>
                            <div class="col-lg-3 col-sm-3 booking_input_forms">
                                <h6>Adult</h6>
                                <select name="adult" id="adult" class="form-control text-bg-light select-box">
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                    <option value="4">4 Adults</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-12" style="margin-top: 18px;">
                                <button type="submit" class="btn btn-danger rounded-0 search-btn">Search Rooms</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <!-- <hr class="underline"> -->
        <!-- End Booking Section  -->

        <!-- Start services room section -->
        <section class="mb-5">
            <div class="service_sections">
                <!-- Start title -->
                <div class="row text-center">
                    <div class="col-12">
                        <h4 class="p-1 mt-5 titles">Our Services</h4>
                        <p class="lead">Making memories in this picture-perfect hotel room</p>
                    </div>
                </div>
                <!-- End title -->
                <div class="d-lg-flex justify-content-center services_rooms d-sm-block">
                    @foreach ($rooms as $room)
                        <div class="col-md-3">
                            <div class="card sd-rooms">
                                <img src="/images/{{ $room->image }}" class="card-img-top" alt="...">
                                <div class="card-body col-sm-12">
                                    <div class="card-title text-uppercase service-texts">
                                        <h5>{{ $room->room_title }}</h5>
                                        <p>{{ $room->room_type }}</p>
                                    </div>
                                    <div class="mt-3 service-quotes">
                                        <h2 class="text-white text-uppercase">{{ $room->room_title }}</h2>
                                        <p class="card-text text-white h5 text-capitalize">{{ $room->room_type }}</p>
                                    </div>
                                    <div class="btn btn-outline-dark service-btn-details">
                                        <a href="{{ route('bedRoom') }}" class="text-white text-decoration-none">View
                                            Details</a>
                                        <i class="fas fa-arrow-right"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End services room section -->

        <!-- Start Rooms Section -->

        <section id="services" class="rooms">
            <div class="container pb-3">

                <!-- Start title -->
                <div class="row text-center">
                    <div class="col-12">
                        <h4 class="p-1 mt-5 text-white titles">Our Rooms</h4>
                        <p class="lead text-white">Relax and unwind in the comfort of our elegantly appointed rooms, where
                            every detail is designed to make your stay memorable and stress-free.</p>
                    </div>
                </div>
                <!-- End title -->

                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                        <div class="card border-0 room-cards">
                            <img src="./images/room1.jpg" alt="image2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card border-0 room-cards">
                            <img src="./images/room2.jpg" alt="image2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card border-0 room-cards">
                            <img src="./images/room3.jpg" alt="image2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card border-0 room-cards">
                            <img src="./images/room4.jpg" alt="image2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="card border-0 room-cards">
                            <img src="./images/room5.jpg" alt="image2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3 ">
                        <div class="card border-0 room-cards">
                            <img src="./images/room6.jpg" alt="image2">
                        </div>
                    </div>


                </div>

            </div>
        </section>

        <!-- End Rooms Section -->

        <!-- Start gallery Section -->

        <section>
            <div id="premises" class="py-5">

                <!-- start title -->

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="p-1 titles">Our Blog</h4>
                        <p class="lead">Experience elegance and comfort in every frame of our hotel gallery</p>

                    </div>
                </div>

                <!-- End title -->

                <div class="row">
                    <div class="col-md-12">
                        <ul id="lightslider" class="light-sliders">
                            <li><img src="./images/gallery1.jpg" alt="01"></li>
                            <li><img src="./images/gallery2.jpg" alt="02"></li>
                            <li><img src="./images/gallery3.jpg" alt="01"></li>
                            <li><img src="./images/gallery4.jpg" alt="02"></li>
                            <li><img src="./images/gallery5.jpg" alt="01"></li>
                            <li><img src="./images/gallery6.jpg" alt="02"></li>
                            <li><img src="./images/gallery7.jpg" alt="01"></li>
                            <li><img src="./images/gallery8.jpg" alt="02"></li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- End gallery Section -->


        <!-- Start Review Section -->

        <!-- Start Customer Review Section -->

        <section id="customer" class="py-3 customers">

            <div class="container-fluid">

                <!-- start title -->

                <div class="row text-center">
                    <div class="col">
                        <h3 class="titles text-light">What Customers say?</h3>
                    </div>
                </div>

                <!-- end title -->

                <!-- data-bs-ride =  -->
                <!-- data-bs-slide-to = နှိပ်လိုက်တဲ့ကောင်တွေရွေ့မယ် "[]"နဲ့အလုပ်လုပ်တယ် -->

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div id="customercarousels" class="carousel slide py-5" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($reviews as $index => $r)
                                    <li data-bs-target="#customercarousels" data-bs-slide-to="{{ $index }}"
                                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($reviews as $r)
                                    <div class="carousel-item text-center {{ $index == 0 ? 'active' : '' }}">
                                        {{-- <img src="/images/user_profile/{{ $user->profile_photo }}"
                                            class="rounded-circle mb-3" alt="user{{ $r->id }}" width="150px"> --}}

                                        <h5 class="text-light text-uppercase fw-bold">{{ $r->name }}</h5>

                                        <blockquote class="text-light">
                                            <p>{{ $r->review_message }}</p>
                                        </blockquote>

                                        <ul class="list-inline">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star {{ $i <= $r->rating ? 'text-warning' : 'text-muted' }}">
                                                    </i>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>
        <!-- End Customer Review Section -->


    </body>

    </html>
@endsection
