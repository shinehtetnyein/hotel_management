@extends('hotel.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-warning text-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Contact Section Start -->
    <div id="contact">
        <div class="container p-4">
            <div class="section-header text-center p-3">
                <h1 class="titles p-2">Contact Us</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim
                    at venenatis tincidunt.
                </p>
            </div>
            <div class="row">

                <div class="col-md-12 text-center pb-3">
                    <div class="row contact-info">
                        <div class="col-md-4">
                            <div class="info-item">
                                <p><i class="fa fa-map-marker contact_icons"></i> 22 Wolf Road, California</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <p><i class="fa fa-envelope contact_icons"></i> <a href="mailto:info@example.com"
                                        class="text-decoration-none text-dark"> info@example.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <p><i class="fa fa-phone contact_icons"></i><a href="tel:+1 234 567 8900"
                                        class="text-decoration-none text-dark"> +1
                                        234 567 8900</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form w-75 m-auto pb-3">
                        <form action="{{ route('saveMessage') }}" method="POST" name="sentMessage" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="row">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <div class="col-sm-6 col-md-6">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" name='name' id="name"
                                        placeholder="E.g. John Sina" required
                                        data-validation-required-message="Please enter your name" />
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="E.g. email@example.com"
                                        data-validation-required-message="Please enter your email" />
                                    @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject"
                                    placeholder="E.g. Room Booking"
                                    data-validation-required-message="Please enter a subject" />
                                @if ($errors->has('subject'))
                                    <div class="text-danger">
                                        {{ $errors->first('subject') }}
                                    </div>
                                @endif
                            </div>
                            <div class="control-group">
                                <label>Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder="E.g. I need a premium room"
                                    required data-validation-required-message="Please enter your message"></textarea>
                                @if ($errors->has('message'))
                                    <div class="text-danger">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="button">
                                <button type="submit" id="sendMessageButton" class="book-nows w-100">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection
