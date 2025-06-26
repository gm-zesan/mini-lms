    <!-- header area -->
    <div class="top_header">
        <div class="container">
            <div class="top_header_wrap">
                <div class="top_header_left">
                    <a href="#">
                        <i class="fas fa-envelope"></i>
                        gmzesan7767@gmail.com
                    </a>
                    <a href="#">
                        <i class="fas fa-map-marker-alt"></i>
                        House # 42, Road # 10, Nikunja 2
                    </a>
                </div>
                <div class="top_header_right">
                    <img src="{{ asset('frontend/img/bismillah.png') }}" alt="" class="bismillah">
                    <div class="icon_box">
                        <a href="#" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!--logo start-->
                <a href="{{ route('frontend.home') }}" class="logo">
                    <img src="{{ asset('frontend/img/logo.png') }}" class="img-fluid" alt="">
                </a>
                <div class="menu_wrapper">
                    <!--menu start-->
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li><a href="{{ route('frontend.about') }}">About</a></li>
                            <li><a href="{{ route('frontend.course') }}">Courses</a></li>
                            <li><a href="{{ route('frontend.team') }}">Our Team</a></li>
                            <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    @if (Session::get('student_id'))
                        <a href="{{ route('student.my-account') }}" class="button">My Account</a>
                    @else
                        <a href="{{ route('student.login') }}" class="button">Login</a>
                    @endif
                </div>
                <div class="mobile_content d-lg-none">
                    <!-- menu toggler -->
                    <div class="hamburger-menu">
                        <span class="line-top"></span>
                        <span class="line-center"></span>
                        <span class="line-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
