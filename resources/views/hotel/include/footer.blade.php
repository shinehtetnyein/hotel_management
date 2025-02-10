<!-- Start Footer Section -->

<footer class="p-5 text-light footers">
    <div class="container">
        <div class="bars-container">
            <div class="row py-4">

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Information</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="footerlinks">Home</a></li>
                        <li><a href="{{ route('bedRoom') }}" class="footerlinks">Bed Rooms</a></li>
                        <li><a href="{{ route('login') }}" class="footerlinks">Login</a></li>
                        <li><a href="{{ route('gallery') }}" class="footerlinks">Gallery</a></li>
                        <li><a href="{{ route('review') }}" class="footerlinks">reviews</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Help</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('aboutUs') }}" class="footerlinks">About</a></li>
                        <li><a href="{{ route('contactUs') }}" class="footerlinks">Contact Us</a></li>
                        <li><a href="{{ route('faq') }}" class="footerlinks">FAQ</a></li>
                    </ul>

                    <div class="footersocialicons">
                        <a href="javascript:void(0);" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="javascript:void(0);" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="javascript:void(0);" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="javascript:void(0);" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Gallery</h6>
                    <div class="gallerys">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery1.jpg"
                                        alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery2.jpg"
                                        alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery3.jpg"
                                        alt=""></a></li>
                        </ul>

                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery4.jpg"
                                        alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery5.jpg"
                                        alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0);"><img src="/images/gallery6.jpg"
                                        alt=""></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Contact Us</h6>
                    <ul class="list-unstyled">
                        <li>121,Min Ye Kyaw Zwar Road, Ahlone, Yangon</li>
                        <li>09 123 455 667</li>
                    </ul>
                </div>

            </div>

            <div class="container">
                <div class="text-light d-flex justify-content-between border-top pt-4">
                    <p>Coppright &copy; <span id="getyear"><a href="#" class="text-danger"></a></span>All rights
                        reserved</p>
                </div>

            </div>

        </div>

</footer>

<!-- End Footer Section -->


<!-- Start Model   -->

<!-- Start Login Section -->
{{-- <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="login modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm" action="{{ route('loginPost') }}" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="col-md-12 text-center p-3">
                            <h5 class="text-uppercase fw-bold p-0 m-0">Login form</h5>
                        </div>
                        <h5 class="text-danger text-center errors" id="errors">
                        </h5>
                        <div class="mb-4 mt-4">
                            <div class="d-flex">
                                <i class="fas fa-envelope input-group-text"></i>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email" autocomplete="off">
                            </div>
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex">
                                <i class="fas fa-key input-group-text"></i>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger btn-sm me-2">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm me-2">Login</button>
                        <p class="m-auto">If you don't have account, <a href="{{ route('register') }}"
                                class="text-decoration-none">Sign Up</a></p>
                    </div>
                </form>
            </div>
            <div>

            </div>
        </div>
    </div>
</div> --}}
<!-- End Login Section -->
