@extends('hotel.layout')
@section('content')
    <!-- About Section Start -->
    <div id="about">
        <div class="container mb-5">
            <div class="section-header text-center mt-2">
                <h2 class="titles p-3">About Royal Hotel</h2>
            </div>
            <div class="row card p-3">
                <div class="row col-sm-12 card-body d-flex">
                    <div class="col-md-6 col-sm-12 me-3">
                        <div class="img-col">
                            <img class="img-fluid" src="/images/about.png">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-sm-3 d-flex justify-content-center align-items-center">
                        <div class="">
                            <h3 class="text-bold">Who we are!!</h3>
                            <p class="">
                                Founded in 2003, Grand Hotel was established with a vision to create a sanctuary where
                                guests can escape the hustle and bustle of everyday life. Our commitment to excellence is
                                reflected in every detail of our hotel, from the elegant design of our rooms and suites to
                                the personalized services provided by our dedicated staff.
                            </p>
                            <a href="#" class="book-nows text-decoration-none p-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
