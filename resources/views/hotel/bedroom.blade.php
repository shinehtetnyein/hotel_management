@extends('hotel.layout')
@section('content')
    <!--Start Banner-->
    <header class="header">
        <div class="banner_images">
            <img src="/images/banner/banner1.jpg" alt="">
        </div>
        <div id="banners" class="banners">
            <div>
                <h4 class="bannerheaders">Choose</h4>
                <h2 class="bannerbodys h5">Rooms</h2>
                <p class="lead bannerparagraphs"> The sole purpose of the bedroom is to melt away any stressors and that
                    can
                    lead you to ideas, and make your life artful.</p>
            </div>
        </div>
    </header>
    <!--End Banner-->
    </header>
    <!--End Header-->
    <section class="container mt-5 mb-5">
        <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($bed_rooms as $bed)
                    <div class="col">
                        <div class="card bedrooms text-center">
                            <div class="card-body p-4 mt-3 bed-card-para">
                                <h2 class="card-title">{{ $bed->room_title }}</h2>
                                <p class="card-text text-justify">{!! Str::limit($bed->description, 150) !!}<a
                                        href="{{ route('detail', $bed->id) }}"> See
                                        more</a>
                                </p>
                                <div class="d-flex booknows">
                                    <p class="m-auto">${{ $bed->price }}/Night</p>
                                    <a href="{{ route('detail', $bed->id, $bed->price) }}"
                                        class="text-decoration-none ps-2 pe-2 pt-1 pb-1 rounded-4 m-auto">Details & Book</a>
                                </div>
                            </div>
                            <div class="bed-card-img">
                                <a href="#">
                                    <img src="/images/{{ $bed->image }}" class="card-img-top rounded-0" alt="...">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
