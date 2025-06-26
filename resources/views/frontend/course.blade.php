@extends('frontend.layouts.app')


@section('title')
    Course
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>All Courses</h2>
            </div>
        </div>
        <!-- all_courses -->
        <div class="selling_courses_area" style="background-image: url({{ asset('frontend/img/courses-two_bg.png') }});">
            <div class="container">
                <form action="{{ route('courses.search') }}" method="GET" class="course_search">
                    <select name="course_id" required>
                        <option value="" selected disabled>Choose Your Course</option>
                        @foreach ($searchCourses as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="button">Search</button>
                </form>
                
                <div class="row mt_70">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 mt_30">
                            <div class="course-block_two-inner">
                                <div class="course-block_two-image">
                                    <a href="{{ route('frontend.course.details', $course->id) }}">
                                        <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}">
                                    </a>
                                </div>
                                <div class="course-block_two-content">
                                    <div class="course-block_two-icon">
                                        <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="img">
                                    </div>
                                    <a href="{{ route('frontend.course.details', $course->id) }}" class="course-block_two-study">Study Now</a>
                                    <h4 class="course-block_two-heading"><a href="{{ route('frontend.course.details', $course->id) }}">{{$course->title}}</a></h4>
                                    <ul class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                        <li><span>{{ $course->total_lessons }}</span>lessons</li>
                                        <li><span>{{ $course->weeks }}</span>weeks</li>
                                        <li><span>{{ $course->enrolled_students_count }}</span>enroll</li>
                                    </ul>
                                    <div class="course-block_two-lower d-flex justify-content-between flex-wrap">
                                        <div class="course-block_two-author">
                                            <div class="course-block_two-author_image">
                                                <img src="{{ asset('frontend/img/author-4.png') }}" alt=""></div>
                                            <strong>Habib Al Noor</strong>
                                            <p>Arabic Teacher</p>
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
    </main>
@endsection
