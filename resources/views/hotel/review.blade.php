@extends('hotel.layout')
@section('content')
    <div class="container_register">
        <div class="review_forms d-flex align-items-center">
            <div class="row m-auto">
                <div class="col-md-12 text-center register-headers">
                    <div class="section-header text-center p-2 text-light">
                        <h2 class="titles p-2">Tell us, how was your stay?</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque
                            convallis, enim
                            at venenatis tincidunt.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 m-auto">
                    <img src="/images/review.jpg" alt="register_image.jpg" class="register_images">
                </div>
                <div class="forms col-md-6 m-auto p-3">
                    <form action="{{ route('reviewMessage') }}" method="POST" name="sentMessage" id="contactForm"
                        novalidate="novalidate" class="form-control">
                        @csrf
                        <div class="row ">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif
                            <div class="col-sm-6 col-md-6">
                                <label>Your Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="E.g. John Sina" />
                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="E.g. email@example.com" />
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label>Title your review</label>
                            <input type="text" class="form-control" name="review_title" id="subject"
                                placeholder="E.g. Give us the gist of your experience" />
                            @if ($errors->has('review_title'))
                                <div class="text-danger">
                                    {{ $errors->first('review_title') }}
                                </div>
                            @endif
                        </div>

                        <!-- Star Rating Section -->
                        <div class="control-group">
                            <label>Rating</label>
                            @if (!empty($value->star_rating))
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="rated">
                                            @for ($i = 1; $i <= $value->star_rating; $i++)
                                                {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                                                <label class="star-rating-complete" title="text">{{ $i }}
                                                    stars</label>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    {{-- <input type="hidden" name="booking_id" value="{{ $value->id }}"> --}}
                                    <div class="col">
                                        <div class="rate">
                                            <input type="radio" id="star5" class="rate" name="rating"
                                                value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" checked id="star4" class="rate" name="rating"
                                                value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" class="rate" name="rating"
                                                value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" class="rate" name="rating"
                                                value="2">
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" class="rate" name="rating"
                                                value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="control-group">
                            <label>Message</label>
                            <textarea class="form-control" name="review_message" id="message" rows="5"
                                placeholder="E.g. The pillows are the fluffiest I've ever felt..."></textarea>
                            @if ($errors->has('review_message'))
                                <div class="text-danger">
                                    {{ $errors->first('review_message') }}
                                </div>
                            @endif
                        </div>







                        <div class="button">
                            <button type="submit" id="sendMessageButton" class="book-nows w-100">Send Message</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
