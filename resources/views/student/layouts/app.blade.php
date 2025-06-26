@extends('frontend.layouts.app')


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>My-Account</h2>
            </div>
        </div>
        {{-- my_account_area --}}
        <div class="my_account_area mt_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt_30">
                        <ul class="profile_list">
                            <li><a href="{{ route('student.my-account') }}" class="{{ request()->routeIs('student.my-account') ? 'active' : '' }}">Profile</a></li>
                            <li><a href="{{ route('student.my-courses') }}" class="{{ request()->routeIs('student.my-courses') ? 'active' : '' }}">My Courses</a></li>
                            <li><a href="{{ route('student.certificate') }}" class="{{ request()->routeIs('student.certificate') ? 'active' : '' }}">Certificate</a></li>
                            <li><a href="{{ route('student.logout') }}" class="{{ request()->routeIs('student.logout') ? 'active' : '' }}">Logout</a></li>
                        </ul>
                    </div>
                    @yield('student-content')
                </div>
            </div>
        </div>
    </main>
@endsection
