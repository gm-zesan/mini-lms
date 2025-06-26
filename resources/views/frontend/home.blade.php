@extends('frontend.layouts.app')


@section('title')
    Home
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- home area -->
        <div class="home_area" style="background-image: url({{ asset('frontend/img/banner-bg.png') }});">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 mt_30">
                        <img src="{{ asset('frontend/img/slide1.png') }}" alt="" class="slide_img">
                    </div>
                    <div class="col-lg-6 mt_30">
                        <img src="{{ asset('frontend/img/text-img.png') }}" alt="" class="text-img">
                        <h1>Allah is the Best of Providers</h1>
                        <a href="{{ route('frontend.course') }}" class="button mt_30">Discover Courses</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- about_area -->
        <div class="about_area">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Welcome to the LMS</p>
                    <h2>Know The Real History of Islam</h2>
                </div>
                <div class="row mt_30">
                    <div class="col-lg-5 mt_50">
                        <div class="islamic-history">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscsed do
                                eiusmod tempor incididunt ut labore etedum dolor sit a
                                ad minim veniam, quis nostr incididunt ut laborcitationn
                                tempor incididunt ut labore

                                um dolor sit amet, consectetur adipiscsed do eiu agna a
                                liqua. Ut enim ad minim veniam, quis nostr incididunt ut
                                laborcitation. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                                cupiditate quisquam quo ducimus dolorum fugit exercitationem aliquid a debitis ad.</p>
                            <ul class="list">
                                <li>Astonishing Facilities</li>
                                <li>Helping CommunitiesLeads </li>
                                <li>Charity EventsSchooling Children</li>
                                <li>Feeding Hungry People</li>
                                <li>Helping CommunitiesLeads </li>
                            </ul>
                            <a href="{{ route('frontend.about') }}" class="button mt_30">Read Our History</a>
                        </div>
                    </div>
                    <div class="col-lg-7 mt_50">
                        <div class="row align-items-end">
                            <div class="col-lg-5 col-6">
                                <div class="circle-text">
                                    <img src="{{ asset('frontend/img/text-circle1.png') }}" class="circle-text-img" alt="circle-img">
                                    <figure class="circle-img">
                                        <img src="{{ asset('frontend/img/circle-img.png') }}" alt="circle-img">
                                    </figure>
                                </div>
                                <div class="real-history-book hoverimg">
                                    <figure>
                                        <img src="{{ asset('frontend/img/real-history-book.jpg') }}" alt="img">
                                    </figure>
                                </div>
                            </div>
                            <div class="col-lg-7 col-6">
                                <div class="real-history-book two hoverimg">
                                    <figure>
                                        <img src="{{ asset('frontend/img/real-history-boy.jpg') }}" alt="real-history-boy">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- opening_area -->
        <div class="opening_area">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Islamic Classes and Courses</p>
                    <h2>Opening Hours</h2>
                </div>
                <div class="row mt_50">
                    <div class="col-xl-3 col-lg-4 col-sm-6 mt_30">
                        <div class="islamic-classes-time">
                            <div class="opening-time">
                                <img src="{{ asset('frontend/img/opening-time-1.jpg') }}" alt="img">
                                <div class="opening-time-text">
                                    <h3><a href="#">Visits &amp; Prayers</a></h3>
                                    <h6>Daily</h6>
                                    <span>10:00 am - 08:00 pm</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 mt_30">
                        <div class="islamic-classes-time">
                            <div class="opening-time">
                                <img src="{{ asset('frontend/img/opening-time-2.jpg') }}" alt="img">
                                <div class="opening-time-text">
                                    <h3><a href="#">Friday Prayer</a></h3>
                                    <h6>Sermon Begins</h6>
                                    <span>12:15 pm &amp; 12:55 pm</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 mt_30">
                        <div class="islamic-classes-time">
                            <div class="opening-time">
                                <img src="{{ asset('frontend/img/opening-time-3.jpg') }}" alt="img">
                                <div class="opening-time-text">
                                    <h3><a href="#">Islamic Classes</a></h3>
                                    <h6>Daily</h6>
                                    <span>11:00 am - 3:00 pm</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 mt_30">
                        <div class="islamic-classes-time mb-0">
                            <div class="opening-time">
                                <img src="{{ asset('frontend/img/opening-time-4.jpg') }}" alt="img">
                                <div class="opening-time-text">
                                    <h3><a href="#">Exhibition</a></h3>
                                    <h6>Weekdays</h6>
                                    <span>10:00 am - 2:00 pm</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services_area -->
        <div class="services_area pt_70 pb_50">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    <h2>Services We Offer</h2>
                </div>
                <div class="row mt_50">
                    <div class="col-lg-4 col-md-6 mt_30">
                        <div class="community hoverimg">
                            <figure>
                                <img src="{{ asset('frontend/img/donation-img-1.jpg') }}" alt="img">
                            </figure>
                            <div class="community-text">
                                <div>
                                    <i>
                                        <img src="{{ asset('frontend/img/ser-1.svg') }}" alt="">
                                    </i>
                                </div>
                                <div>
                                    <a href="#">Community</a>
                                    <p>Lorem ipsum dolor sit amet, comp or incididunt ut labo enim ad unt ut labo enim
                                        ad mini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt_30">
                        <div class="community hoverimg">
                            <figure>
                                <img src="{{ asset('frontend/img/donation-img-2.jpg') }}" alt="img">
                            </figure>
                            <div class="community-text">
                                <div>
                                    <i>
                                        <img src="{{ asset('frontend/img/ser-2.svg') }}" alt="">
                                    </i>
                                </div>
                                <div>
                                    <a href="#">Education</a>
                                    <p>Lorem ipsum dolor sit amet, comp or incididunt ut labo enim ad unt ut labo enim
                                        ad mini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt_30">
                        <div class="community hoverimg mb-0">
                            <figure>
                                <img src="{{ asset('frontend/img/donation-img-3.jpg') }}" alt="img">
                            </figure>
                            <div class="community-text">
                                <div>
                                    <i>
                                        <img src="{{ asset('frontend/img/ser-3.svg') }}" alt="">
                                    </i>
                                </div>
                                <div>
                                    <a href="#">Donation</a>
                                    <p>Lorem ipsum dolor sit amet, comp or incididunt ut labo enim ad unt ut labo enim
                                        ad mini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cont_link_area">
            <div class="container">
                <div class="cont_wrap_link" style="background-image: url({{ asset('frontend/img/cta-one_bg.png') }});">
                    <h2> Do not let Shaitan delay you from starting to learn your deen</h2>
                    <a href="#" class="button">Quick Start Now</a>
                </div>
            </div>
        </div>
        <!-- selling_courses -->
        <div class="selling_courses_area" style="background-image: url({{ asset('frontend/img/courses-two_bg.png') }});">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    <h2>Ongoing Courses</h2>
                </div>
                <div class="row mt_70">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 mt_30">
                            <div class="course-block_two-inner">
                                <div class="course-block_two-image">
                                    <a href="{{ route('frontend.course.details', $course->id) }}"><img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}"></a>
                                </div>
                                <div class="course-block_two-content">
                                    <div class="course-block_two-icon">
                                        <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                                    </div>
                                    <a href="{{ route('frontend.course.details', $course->id) }}" class="course-block_two-study">Study Now</a>
                                    <h4 class="course-block_two-heading"><a href="{{ route('frontend.course.details', $course->id) }}">{{$course->title}}</a></h4>
                                    <ul
                                        class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                        <li><span>{{ $course->total_lessons }}</span>lessons</li>
                                        <li><span>{{ $course->weeks }}</span>weeks</li>
                                        <li><span>{{ $course->enrolled_students_count }}</span>enroll</li>
                                    </ul>
                                    <div class="course-block_two-lower d-flex justify-content-between flex-wrap">
                                        <div class="course-block_two-author">
                                            <div class="course-block_two-author_image">
                                                @if ($course->teachers->isNotEmpty())
                                                    <img src="{{ asset('storage/'.$course->teachers->first()->image) }}" alt="{{ $course->teachers->first()->name }}">
                                                @else
                                                    <img src="{{ asset('frontend/img/author-4.png') }}" alt="Admin">
                                                @endif
                                            </div>
                                            @if ($course->teachers->isNotEmpty())
                                                <strong>{{ $course->teachers->first()->name }}</strong>
                                            @else
                                                <strong>Admin</strong>
                                            @endif
                                            
                                        </div>
                                        <div class="course-block_two-price">{{ number_format($course->price,0) }} ৳ <span>course fee</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="counter_area">
            <div class="container">
                <div class="heading text-center mb_70">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>This Institute Admission Success for 2022-24 academic year</p>
                    <h2>Your success is our inspiration</h2>
                </div>
                <div class="total_student loader">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="count_flex"><h2 class="count">{{ $total_students }}</h2> +</div>
                            <p>Total Student</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="count_flex"><h2 class="count">{{ $total_teacher }}</h2> +</div>
                            <p>All Teachers</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="count_flex"><h2 class="count">{{ $total_courses }}</h2> +</div>
                            <p>Total Courses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews_area -->
        <div class="reviews_area" style="background-image: url({{ asset('frontend/img/parallax2.jpg') }});">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <h2>Student Reviews</h2>
                </div>
                <div class="owl-carousel slider1 mt_70">
                    <div class="item">
                        <div class="testi-box">
                            <div class="testi-desc">
                                <p>Lorem ipsum dolor sit amet, consect etur adipiscing elit, sed do eiusmoed tempor
                                    incididunt.</p>
                            </div>
                            <div class="text-img-bott">
                                <img src="{{ asset('frontend/img/testi-img4.jpg') }}" alt="">
                                <h3>Muhammad Hojaifa</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-box">
                            <div class="testi-desc">
                                <p>Lorem ipsum dolor sit amet, consect etur adipiscing elit, sed do eiusmoed tempor
                                    incididunt.</p>
                            </div>
                            <div class="text-img-bott">
                                <img src="{{ asset('frontend/img/author-4.png') }}" alt="">
                                <h3>Nur Muhammad</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-box">
                            <div class="testi-desc">
                                <p>Lorem ipsum dolor sit amet, consect etur adipiscing elit, sed do eiusmoed tempor incididunt.</p>
                            </div>
                            <div class="text-img-bott">
                                <img src="{{ asset('frontend/img/testi-img4.jpg') }}" alt="">
                                <h3>Muhammad Hojaifa</h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-box">
                            <div class="testi-desc">
                                <p>Lorem ipsum dolor sit amet, consect etur adipiscing elit, sed do eiusmoed tempor
                                    incididunt.</p>
                            </div>
                            <div class="text-img-bott">
                                <img src="{{ asset('frontend/img/testi-img4.jpg') }}" alt="">
                                <h3>Muhammad Hojaifa</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
