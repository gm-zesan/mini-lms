@extends('frontend.layouts.app')


@section('title')
    About
@endsection

{{-- {{ asset('frontend/css/bootstrap.min.css') }} --}}
@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>About Us</h2>
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
                                laborcitation. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia cupiditate
                                quisquam quo ducimus dolorum fugit exercitationem aliquid a debitis ad.</p>
                            <ul class="list">
                                <li>Astonishing Facilities</li>
                                <li>Helping CommunitiesLeads </li>
                                <li>Charity EventsSchooling Children</li>
                                <li>Feeding Hungry People</li>
                                <li>Helping CommunitiesLeads </li>
                            </ul>
                            <a href="about.html" class="button mt_30">Read Our History</a>
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
        <!-- features-section -->
        <section class="features-section">
            <div class="container">
                <div class="row">
                    <!-- Feature Block -->
                    <div class="feature-block col-lg-3 col-md-6 col-6 mt_30">
                        <div class="inner-box ">
                            <img src="{{ asset('frontend/img/webinar-2.png') }}" alt="">
                            <h5 class="title">Online<br> Certifications</h5>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-lg-3 col-md-6 col-6 mt_30">
                        <div class="inner-box ">
                            <img src="{{ asset('frontend/img/online-learning.png') }}" alt="">
                            <h5 class="title">Top<br> Instructors</h5>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-lg-3 col-md-6 col-6 mt_30">
                        <div class="inner-box ">
                            <img src="{{ asset('frontend/img/webinar-1.png') }}" alt="">
                            <h5 class="title">Unlimited <br>Online Courses</h5>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-lg-3 col-md-6 col-6 mt_30">
                        <div class="inner-box ">
                            <img src="{{ asset('frontend/img/webinar.png') }}" alt="">
                            <h5 class="title">Experienced <br>Members</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- courses_button_area -->
        <div class="courses_button_area">
            <div class="container">
                <div class="courses_button_wrap">
                    <p><strong>23,000+</strong>more skillful courses you can explore </p>
                    <a href="#" class="button">Explore All Courses</a>
                </div>
            </div>
        </div>
        <!-- team_area -->
        <div class="team_area">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Meet Our Professional Team Members</p>
                    <h2>Team Member</h2>
                </div>
                <div class="row mt_50">
                    <div class="col-lg-4 col-md-6 mt_50">
                        <div class="team-two__item">
                            <div class="team-two__image">
                                <img src="{{ asset('frontend/img/team-2-1.jpg') }}" alt="eduact">
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__title">
                                    <a href="team-details.html">Aleesha Brown</a>
                                </h3>
                                <span class="team-two__designation">Web Developer</span>
                                <div class="team-two__social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt_50">
                        <div class="team-two__item">
                            <div class="team-two__image">
                                <img src="{{ asset('frontend/img/team-2-3.jpg') }}" alt="eduact">
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__title">
                                    <a href="team-details.html">Aleesha Brown</a>
                                </h3>
                                <span class="team-two__designation">Web Developer</span>
                                <div class="team-two__social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt_50">
                        <div class="team-two__item">
                            <div class="team-two__image">
                                <img src="{{ asset('frontend/img/team-2-1.jpg') }}" alt="eduact">
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__title">
                                    <a href="team-details.html">Aleesha Brown</a>
                                </h3>
                                <span class="team-two__designation">Web Developer</span>
                                <div class="team-two__social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
