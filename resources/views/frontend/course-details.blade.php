@extends('frontend.layouts.app')


@section('title')
    Course Details
@endsection

@push('styles')
    <style>
        /* .comment-form-wrapper{
                padding: 0.6rem 2rem;
                border-radius: 0.7rem;
                font-size: 2.5rem;
            } */
        .text-warning {
            color: #ffc107;
            /* Gold color for stars */
        }

        .text-muted {
            color: #ddd;
            /* Light gray for empty stars */
        }

        .show-more {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
@endpush


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>{{ $course->title }}</h2>
            </div>
        </div>
        <!-- course_details_area -->
        <div class="course_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt_50">
                        <div class="courses-details_cont hoverimg">
                            <figure>
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-100">
                            </figure>
                            <h2>{{ $course->title }}</h2>
                            <div class="total_student">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h2>{{ $course->enrolled_students_count }}+</h2>
                                        <p>Student</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>{{ $course->weeks }}+</h2>
                                        <p>Weeks</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>{{ $course->total_lessons }}+</h2>
                                        <p>Total Lessons</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <button class="nav-link active" id="pills-paths-tab" data-toggle="pill"
                                        data-target="#pills-paths" type="button" aria-controls="pills-paths"
                                        aria-selected="true">Details</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-learn-tab" data-toggle="pill"
                                        data-target="#pills-learn" type="button" aria-controls="pills-learn"
                                        aria-selected="false">Content</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-for-tab" data-toggle="pill" data-target="#pills-for"
                                        type="button" aria-controls="pills-for" aria-selected="false">pre
                                        requisite</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-time-tab" data-toggle="pill"
                                        data-target="#pills-time" type="button" aria-controls="pills-time"
                                        aria-selected="false">Time & schedule</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-teacher-tab" data-toggle="pill"
                                        data-target="#pills-teacher" type="button" aria-controls="pills-teacher"
                                        aria-selected="false">Instructor</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-paths" aria-labelledby="pills-paths-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->description !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-learn" aria-labelledby="pills-learn-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->what_will_learn !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-for" aria-labelledby="pills-for-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->prerequisites !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-time" aria-labelledby="pills-time-tab">
                                    <ul class="time_course">
                                        {!! $course->time_schedule !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-teacher" aria-labelledby="pills-teacher-tab">
                                    @foreach ($course->teachers as $teacher)
                                        <div class="teacher_info">
                                            <div class="teacher_img">
                                                <img src="{{ asset('storage/' . $teacher->image) }}"
                                                    alt="{{ $teacher->name }}">
                                            </div>
                                            <div class="teacher_data">
                                                <h2>{{ $teacher->name }}</h2>
                                                <p>{{ $teacher->email }}</p>
                                                <p>{{ $teacher->phone_no }}</p>
                                                <p>{!! $teacher->details !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt_50">
                        <div class="path_box possition_fixed">
                            <h2>What is this course?</h2>
                            {!! $course->description !!}
                            <h3>৳ {{ number_format($course->price, 0) }}</h3>
                            <a href="{{ route('frontend.enroll', $course->id) }}" class="button">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- course_share -->
        <div class="course_review_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="review_share">
                            <h2>User reviews</h2>
                            <div class="share_wrap">
                                <h3>Share</h3>
                                <div class="icon_box">
                                    <a href="#" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="comments-box-wrapper">
                            <div class="comments-count">
                                <h2>Comments</h2>
                            </div>
                            @forelse ($reviews as $review)
                                <div class="single-comment my-2">
                                    <div class="authors-info">
                                        <div class="author-thumb">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('storage/' . $review->student->image) ?? asset('frontend/img/default-avatar.png') }}"
                                                    alt="Author Avatar">
                                            </a>
                                        </div>
                                        <div class="author-data">
                                            <a href="javascript:void(0)">
                                                {{ $review->student->name }}
                                            </a>
                                            <p>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <span class="text-warning">&#9733;</span>
                                                    @else
                                                        <span class="text-muted">&#9734;</span>
                                                    @endif
                                                @endfor
                                                ({{ $review->created_at->diffForHumans() }})
                                            </p>
                                            <div class="comment">
                                                <p>
                                                    <span
                                                        class="short-feedback">{{ \Illuminate\Support\Str::limit($review->feedback, 150) }}</span>
                                                    <span class="full-feedback d-none">{{ $review->feedback }}</span>
                                                    @if (strlen($review->feedback) > 150)
                                                        <span class="text-primary show-more">Read more</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No reviews yet. Be the first to review!</p>
                            @endforelse
                        </div>
                        <div class="comment-form-wrapper mt_30">
                            @if (Session::get('student_id'))
                                <h2> Write Your Comment</h2>
                                <form action="{{ route('student.reviews.store', ['course' => $course->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="rating" id="rating" class="form-control" required>
                                                <option disabled selected>Select Rating</option>
                                                <option value="1">1 Star</option>
                                                <option value="2">2 Star</option>
                                                <option value="3">3 Star</option>
                                                <option value="4">4 Star</option>
                                                <option value="5">5 Star</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="feedback" id="feedback" class="form-control" rows="5" placeholder="Write your feedback"
                                                required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="button">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <a href="{{ route('student.login') }}" class="button">Login</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.show-more').on('click', function() {
                const $parent = $(this).closest('.comment');
                $parent.find('.short-feedback').addClass('d-none');
                $parent.find('.full-feedback').removeClass('d-none');
                $(this).hide();
            });
        });
    </script>
@endpush