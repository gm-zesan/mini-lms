@extends('frontend.layouts.app')


@section('title')
    Gallery
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Our Gallery</h2>
            </div>
        </div>
        <!-- image_gallery_area -->
        <div class="image_gallery_area">
            <div class="container">
                <div class="heading text-center mb_70">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Welcome to the LMS</p>
                    <h2>Our Gallery</h2>
                </div>
                <div class="row_flex">
                    <div class="column">
                        <a href="{{ asset('frontend/img/opening-time-1.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/opening-time-1.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/opening-time-2.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/opening-time-2.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/opening-time-3.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/opening-time-3.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/opening-time-4.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/opening-time-4.jpg')}}" alt="" />
                        </a>
                    </div>
                    <div class="column">
                        <a href="https://www.youtube.com/watch?v=CI6jvyQ8gSI"  id="play-video">
                            <img src="{{ asset('frontend/img/play.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-2.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-2.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-3.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-3.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-4.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-4.jpg')}}" alt="" />
                        </a>
                    </div>
                    <div class="column">
                        <a href="{{ asset('frontend/img/gallery-5.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-5.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-6.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-6.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-7.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-7.jpg')}}" alt="" />
                        </a>
                        <a href="{{ asset('frontend/img/gallery-8.jpg')}}" class="proje_img">
                            <img src="{{ asset('frontend/img/gallery-8.jpg')}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
    </main>
@endsection
