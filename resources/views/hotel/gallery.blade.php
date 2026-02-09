@extends('hotel.layout')
@section('content')
    <section id="services" class="rooms">
        <div class="container pb-3">

            <!-- Start title -->
            <div class="row text-center">
                <div class="col-12">
                    <h4 class="p-1 mt-5 text-white titles">Our Gallery</h4>
                    <p class="lead text-white">The photo gallery ahead will give you a look at all the can't-miss outfits
                        from the week — all in one place.</p>
                </div>
            </div>
            <!-- End title -->

            <div class="row">

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery1.jpg" alt="gallery1">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery2.jpg" alt="gallery2">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery3.jpg" alt="gallery3">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery4.jpg" alt="gallery4">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery5.jpg" alt="gallery5">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3 ">
                    <div class="card border-0 room-cards">
                        <img src="/images/gallery6.jpg" alt="gallery6">
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
