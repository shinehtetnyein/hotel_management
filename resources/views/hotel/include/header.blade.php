<!-- Start Header Intro -->
<div class="headerintros visiblelgs">
    <div class="container infos">
        <table>
            <tr>
                <td><i class="fas fa-phone"></i></td>
                <td>+95942204225</td>
            </tr>
        </table>
        <table>
            <tr class="headericons">
                <td>FollowUs:</td>
                <td><a href="javascript:void(0);"><i class="fab fa-facebook"></i></a></td>
                <td><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></td>
                <td><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></td>
            </tr>
        </table>
    </div>
</div>
<!-- End Header Intro -->
<!--Start Nav Bar-->
<nav class="navbar navbar-expand-lg bg-white navbar-dark navbars">
    <div class="logo col-md-4">
        <div class="text-center">
            <a href="{{ route('home') }}">
                <img src="/images/logo/logo.png" alt="logo.png">
            </a>
        </div>
    </div>
    <button type="button" class="navbar-toggler navbuttons me-2" data-bs-toggle="collapse" data-bs-target="#nav">
        <div class="bg-light lines1"></div>
        <div class="bg-light lines2"></div>
        <div class="bg-light lines3"></div>
    </button>
    <div id="nav" class="navbar-collapse collapse justify-content-center ms-5">
        <ul class="navbar-nav navbars align-items-center">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
            <li class="nav-item"><a href="{{ route('bedRoom') }}" class="nav-link">Rooms</a></li>
            <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
            <li class="nav-item"><a href="{{ route('contactUs') }}" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="{{ route('aboutUs') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ route('faq') }}" class="nav-link">FAQ </a></li>

            <li class="nav-item">
                @guest
                    <!-- Show the Sign In link if the user is not authenticated -->
                    <a href="{{ route('login') }}" id="signIn" class="nav-link">Sign In</a>
                @endguest

                @auth
                    <!-- Show the dropdown menu if the user is authenticated -->
                    <div class="dropdown ms-4" style="cursor: pointer;">
                        <div data-bs-toggle="dropdown" class="d-flex align-items-center profile_dropdown_header">
                            <div class="text-dark text-decoration-none profile-img-header">
                                <img src="/images/user_profile/{{ Auth::user()->profile_photo }}"
                                    alt="{{ Auth::user()->profile_photo }}">
                            </div>
                            <p class="profile_arrows">
                                <i class="fas fa-chevron-circle-down"></i>
                            </p>
                        </div>

                        {{-- <span class="ms-1 h5 m-auto">{{ $user->first_name . ' ' . $user->last_name }}</span> --}}
                        <ul class="dropdown-menu">
                            <li>
                                {{-- <form action="{{ route('profile') }}" method="POST">
                                    <a type="submit" class="dropdown-item">Profile</a>
                                </form> --}}
                                <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                            </li>
                            {{-- <li><a href="{{ route('profile', {{ session()->get('user')->id }}) }}" class="dropdown-item"></a></li> --}}
                            <li><a href="{{ route('review') }}" class="dropdown-item">Write reviews</a></li>
                            {{-- <li><a href="{{ route('booking', ['id' => $booking->id]) }}" class="dropdown-item">Booking</a>
                            </li> --}}
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a href="{{ route('logout') }}" class="dropdown-item">Sign out</a></li>
                        </ul>
                    </div>
                @endauth
            </li>

        </ul>
    </div>
</nav>
<!--End Nav Bar-->
