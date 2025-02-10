<div class="wrapper d-flex align-items-stretch">
    <div class="">
        <nav id="sidebar" class="admin_nav"
            style=" background: rgb(168,0,0); background: linear-gradient(180deg, rgb(161, 1, 1) 15%, rgba(2,0,36,1) 15%);">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn text-light"
                    style="background-color: rgb(161, 1, 1);">
                    <i class="fa-solid fa-right-left"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-3">
                <div class="">
                    <div style="width: 100px; height:100px;">
                        <img src="/images/user_profile/{{ auth('admin')->user()->profile_photo }}" alt=""
                            style="width: 200px; height:100px; border-radius:50%;">
                    </div>
                    <div class="ms-4 w-100">
                        <h3 class="text-light">{{ auth('admin')->user()->first_name }}</h3>
                        <p>{{ auth('admin')->user()->email }}</p>
                    </div>
                </div>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"><span class="fa fa-house mr-3 text-white"></span>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('orderBooking') }}"><span
                                class="fa-solid fa-table-list mr-3 text-light"></span>
                            Order
                            Booking</a>
                    </li>
                    <li>
                        <a href="{{ route('roomList') }}"><span class="fa-solid fa-hotel mr-3 text-white"></span>
                            Room
                            List</a>
                    </li>
                    <li>
                        <a href="{{ route('customer') }}"><span class="fa-solid fa-users mr-3 text-white"></span>
                            Customer</a>
                    </li>
                    <li>
                        <a href="{{ route('bookingList') }}"><span class="fa fa-suitcase mr-3 text-white"></span>
                            Booking List</a>
                    </li>
                    <li>
                        <a href="{{ route('bookingReject') }}"><span class="fa-solid fa-ban mr-3 text-white"></span>
                            Booking
                            Reject</a>
                    </li>
                    <li>
                        <a href="{{ route('adminReview') }}"><span
                                class="fa fa-paper-plane mr-3 text-white"></span>Reviews</a>
                    </li>
                    <li>
                        <a href="{{ route('message') }}"><span
                                class="fa fa-suitcase mr-3 text-white"></span>Message</a>
                    </li>
                    <li>
                        <a href="{{ route('account') }}"><span
                                class="fa-solid fa-circle-user mr-3 text-white"></span>Account</a>
                    </li>
                    <li>
                        <a href="{{ route('accountSetting') }}"><span
                                class="fa-solid fa-circle-user mr-3 text-white"></span>Account Setting</a>
                    </li>
                    <li>
                        <a href="{{ route('payment') }}"><span
                                class="fa-solid fa-credit-card mr-3 text-white"></span>Payment</a>
                    </li>
                    <li>
                        <a href="{{ route('adminLogout') }}"><span
                                class="fa-solid fa-right-from-bracket mr-3 text-white"></span>Logout</a>
                    </li>
                </ul>

                {{-- <div class="mb-5 opacity-0">
                    <h3 class="h6 mb-3">Subscribe for newsletter</h3>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div> --}}


            </div>

        </nav>

    </div>
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <div style="margin-left:30px;">
            <header class="mt-5">
                <div class="container-fluid">
                    <div class="">
                        <div class="row align-items-center justify-content-end">
                            <!-- Actions -->
                            <div class="col-sm-6 col-md-4 text-sm-end">
                                <div class="">
                                    <a href="{{ route('addRoom') }}"
                                        class="btn d-inline-flex btn-sm mx-1 border text-light"
                                        style=" background: rgb(168,0,0); background: linear-gradient(180deg, rgb(161, 1, 1) 15%, rgba(2,0,36,1) 95%);">
                                        <span class="m-auto">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </span>
                                        <span class="ms-2 p-1">Add Room</span>
                                    </a>
                                    <div class="dropdown ms-4 me-5" style="cursor: pointer;">
                                        <div data-bs-toggle="dropdown"
                                            class="d-flex align-items-center profile_dropdown_header">
                                            <div class="text-dark text-decoration-none profile-img-header">
                                                <img src="/images/admin_profile/{{ auth('admin')->user()->profile_photo }}"
                                                    alt="">
                                            </div>
                                            <p class="profile_arrows">
                                                <i class="fas fa-chevron-circle-down"></i>
                                            </p>
                                        </div>

                                        {{-- <span class="ms-1 h5 m-auto">{{ $user->first_name . ' ' . $user->last_name }}</span> --}}
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('accountSetting') }}" class="dropdown-item">Account
                                                    Settings</a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a href="{{ route('adminLogout') }}" class="dropdown-item">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mt-3">
                @yield('content')
            </div>
        </div>
    </div>
</div>
