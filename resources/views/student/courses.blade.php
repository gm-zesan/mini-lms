@extends('student.layouts.app')


@section('title')
    My-Course
@endsection


@section('student-content')
    <div class="col-lg-8 mt_30">
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-lg-4 mb_30">
                    <div class="course-block_two-inner">
                        <div class="course-block_two-image">
                            <a href="{{ route('frontend.course.details', $course->id) }}"><img src="{{ asset('storage/'.$course->image) }}" alt="{{$course->title}}"></a>
                        </div>
                        <div class="course-block_two-content">
                            <div class="course-block_two-icon">
                                <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                            </div>
                            <a href="{{ route('frontend.course.details', $course->id) }}" class="course-block_two-study">Study Now</a>
                            <h4 class="course-block_two-heading"><a href="{{ route('frontend.course.details', $course->id) }}">{{$course->title}}</a></h4>
                            <ul class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                <li><span>{{ $course->total_lessons }}</span>lessons</li>
                                <li><span>{{ $course->weeks }}</span>weeks</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-danger">No Course Found</div>
                </div>
            @endforelse
            {{-- <div class="col-lg-4 mb_30">
                <div class="course-block_two-inner">
                    <div class="course-block_two-image">
                        <a href="course-detail.html"><img src="{{ asset('frontend/img/course-7.jpg') }}" alt=""></a>
                    </div>
                    <div class="course-block_two-content">
                        <div class="course-block_two-icon">
                            <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                        </div>
                        <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                        <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                Al-Fatiha Short Course </a></h4>
                        <ul class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                            <li><span>20</span>lessons</li>
                            <li><span>10</span>weeks</li>
                            <li><span>50</span>enroll</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb_30">
                <div class="course-block_two-inner">
                    <div class="course-block_two-image">
                        <a href="course-detail.html"><img src="{{ asset('frontend/img/dev_ops.jpg') }}" alt=""></a>
                    </div>
                    <div class="course-block_two-content">
                        <div class="course-block_two-icon">
                            <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                        </div>
                        <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                        <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                Al-Fatiha Short Course </a></h4>
                        <ul class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                            <li><span>20</span>lessons</li>
                            <li><span>10</span>weeks</li>
                            <li><span>50</span>enroll</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb_30">
                <div class="course-block_two-inner">
                    <div class="course-block_two-image">
                        <a href="course-detail.html"><img src="{{ asset('frontend/img/course-7.jpg') }}" alt=""></a>
                    </div>
                    <div class="course-block_two-content">
                        <div class="course-block_two-icon">
                            <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                        </div>
                        <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                        <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                Al-Fatiha Short Course </a></h4>
                        <ul class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                            <li><span>20</span>lessons</li>
                            <li><span>10</span>weeks</li>
                            <li><span>50</span>enroll</li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
