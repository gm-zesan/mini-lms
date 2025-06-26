@extends('frontend.layouts.app')


@section('title')
    Enroll
@endsection


@push('styles')
    <style>
        .alert-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alert {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .alert.alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 5px solid #721c24;
        }
        .alert.alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 5px solid #155724;
        }

        .alert-icon {
            margin-right: 15px;
        }

        .icon {
            width: 24px;
            height: 24px;
        }
        .alert-danger .icon {
            stroke: #721c24;
        }
        .alert-success .icon {
            stroke: #155724;
        }

        .alert-content {
            flex-grow: 1;
        }

        .alert-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .alert-content ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-content ul li {
            margin-bottom: 5px;
        }
    </style>    
@endpush

@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Enroll</h2>
            </div>
        </div>
        {{-- enrol_course_area --}}
        @if (isset($course))
            <div class="enrol_course_area">
                <div class="container">
                    <div class="enrol_cont_wrap" style="background-image: url({{ asset('frontend/img/banner11.jpg') }});">
                        <h2>{{ $course->title }}</h2>
                        {!! $course->description !!}
                        <h3><strong>Course Price :</strong> ৳ {{ number_format($course->price, 0) }}</h3>
                    </div>
                </div>
            </div>
        @endif
        <!-- donate_from_area -->
        <div class="donate_from_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert-container">
                                <div class="alert alert-danger">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15h2m-1-7v4m4.938 4.5c.86 1.77-.293 3.5-2.128 3.5H7.19c-1.835 0-2.988-1.73-2.128-3.5l4.5-9a2 2 0 013.667 0l4.5 9z" />
                                        </svg>
                                    </div>
                                    <div class="alert-content">
                                        <h4 class="alert-heading">Oops! Please fix the following errors:</h4>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert-container">
                                <div class="alert alert-danger">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15h2m-1-7v4m4.938 4.5c.86 1.77-.293 3.5-2.128 3.5H7.19c-1.835 0-2.988-1.73-2.128-3.5l4.5-9a2 2 0 013.667 0l4.5 9z" />
                                        </svg>
                                    </div>
                                    <div class="alert-content">
                                        <h4 class="alert-heading">Oops! Please fix the following errors:</h4>
                                        <ul>
                                            <li>{{ session('error') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert-container">
                                <div class="alert alert-success">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div class="alert-content">
                                        <h4 class="alert-heading">Success!</h4>
                                        <p>{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 mt_50">
                        <div class="donate_from_cart">
                            <div class="bank_wrap">
                                <img src="{{ asset('frontend/img/Bank.png') }}" alt="">
                                <ul>
                                    <li>Name- MOTIUR RAHMAN</li>
                                    <li><strong>AC No-</strong> 20503830200444418</li>
                                    <li>Branch- Sonargaon janapath Road</li>
                                    <li>Islami Bank Bangladesh Ltd </li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/bkash.png') }}" alt="">
                                <ul>
                                    <li><strong>Bkash No-</strong> 01648888163</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/nagad.jpg') }}" alt="">
                                <ul>
                                    <li><strong>Nagad No-</strong> 01648888163</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/Rocket.png') }}" alt="">
                                <ul>
                                    <li><strong>Rocket No-</strong> 01648888163</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt_50">
                        <form action="{{ route('frontend.enroll.submit') }}" method="POST" class="donate_from_cart">
                            @csrf
                            @if (isset($course))
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                            @else
                                <select name="course_id" id="course_id" required>
                                    <option value="" selected disabled>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            @endif
                            @if (isset($student->id))
                                <input type="text" name="name" value="{{ $student->name }}" readonly required>
                            @else
                                <input type="text" name="name" placeholder="Full Name">
                            @endif

                            @if (isset($student->id))
                                <input type="email" name="email" value="{{ $student->email }}" readonly required>
                            @else
                                <input type="email" name="email" placeholder="Email">
                            @endif

                            @if (isset($student->id))
                                <input type="number" name="phone_no" value="{{ $student->phone_no }}" readonly required>
                            @else
                                <input type="number" name="phone_no" placeholder="Phone Number">
                            @endif

                            <select name="payment_method" id="payment_method" required>
                                <option value="Islami-Bank">Islami Bank Bangladesh Ltd</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Rocket">Rocket</option>
                            </select>
                            <input type="text" name="transaction_id" placeholder="Transaction ID">
                            <input type="number" name="total_amount" placeholder="Amount">
                            <button type="submit" class="button">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
