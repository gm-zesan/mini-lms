@extends('frontend.layouts.app')


@section('title')
    Login
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
            background-color: #f8d7da;
            color: #721c24;
            border-left: 5px solid #721c24;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-icon {
            margin-right: 15px;
        }

        .icon {
            width: 24px;
            height: 24px;
            stroke: #721c24;
        }

        .alert-content {
            flex-grow: 1;
        }

        .alert-heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        ul li {
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
                <h2>Sign up / Login</h2>
            </div>
        </div>
        
        
        <!-- contact_area -->
        <div class="login_area">
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
            
            <div class="container">
                <div class="login_main">
                    <input type="checkbox" id="chk" aria-hidden="true"  @if(session('status') === 'login') checked @endif>

                    <div class="signup">
                        <form action="{{ route('student.register') }}" method="POST">
                            @csrf
                            <label for="chk" aria-hidden="true">Registration</label>
                            <input type="text" name="name" placeholder="User name" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="number" name="phone_no" placeholder="Phone Number" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            <button type="submit">Sign up</button>
                        </form>
                    </div>

                    <div class="login">
                        <form action="{{ route('student.processLogin') }}" method="POST">
                            @csrf
                            <label for="chk" aria-hidden="true" class="title_label">Login</label>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
