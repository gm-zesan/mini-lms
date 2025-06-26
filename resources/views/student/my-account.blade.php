@extends('student.layouts.app')

@section('title', 'My Profile')

@push('styles')
    <style>
        .avatar-label {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border: 2px solid #10ac9e;
            border-radius: 50%;
            height: 130px;
            width: 130px;
            margin: 0 auto;
            cursor: pointer;
        }
        .avatar-label i {
            position: absolute;
            bottom: 20px;
            right: 7px;
            color: black;
            font-size: 18px;
        }
        .avatar-label img {
            height: 95%;
            border-radius: 50%;
            object-fit: cover;
        }
        .avatar-label:hover {
            border-color: #0f897b;
        }
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
        .alert-container ul {
            margin: 0;
            padding-left: 20px;
        }
        .alert-container ul li {
            margin-bottom: 5px;
        }
        .donate_from_cart input{
            margin-bottom: 0rem;
        }
    </style>
@endpush

@section('student-content')
    <div class="col-lg-8 mt_30">
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
        <form class="donate_from_cart" action="{{ route('student.my-account.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="email" value="{{ $student->email }}">

            <div class="row">
                <div class="col-lg-12 mb_30">
                    <div class="text-center">
                        <small id="avatarError" class="text-danger"></small>
                        <label for="avatar" class="form-label avatar-label">
                            <img id="avatarPreview" 
                                 src="{{ $student->image ? asset('storage/' . $student->image) : asset('frontend/img/avatar.jpg') }}" 
                                 alt="{{ $student->name }}" 
                                 class="rounded-full mb-2" 
                                 style="height: 95%; border-radius: 50%;">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" id="avatar" name="image" class="form-control d-none" onchange="previewAvatar()">
                        <p>{{ $student->email }}</p>
                    </div>
                </div>
                

                <!-- Form Fields -->
                <div class="col-lg-6" style="margin-bottom: 3.5rem;">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name', $student->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6" style="margin-bottom: 3.5rem;">
                    <input type="number" name="phone_no" class="form-control" placeholder="Phone No" value="{{ old('phone_no', $student->phone_no) }}">
                    @error('phone_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-12" style="margin-bottom: 3.5rem;">
                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address', $student->address) }}">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-lg-12 mb-3">
                    <hr>
                </div>

                <!-- Password Fields -->
                <div class="col-lg-4" style="margin-bottom: 3.5rem;">
                    <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                    @error('current_password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-4" style="margin-bottom: 3.5rem;">
                    <input type="password" name="password" class="form-control" placeholder="New Password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-4" style="margin-bottom: 3.5rem;">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="col-lg-12">
                    <button type="submit" class="button">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewAvatar() {
            const fileInput = document.getElementById('avatar');
            const preview = document.getElementById('avatarPreview');
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            const maxSize = 2 * 1024 * 1024;
            const errorMessage = document.getElementById('avatarError');

            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];
                if (!allowedTypes.includes(file.type)) {
                    errorMessage.textContent = 'Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.';
                    fileInput.value = ''; 
                    preview.src = "{{ $student->image ? asset('storage/' . $student->image) : asset('frontend/img/avatar.jpg') }}";
                    return;
                }
                if (file.size > maxSize) {
                    errorMessage.textContent = 'File size must be less than 2MB.';
                    fileInput.value = '';
                    preview.src = "{{ $student->image ? asset('storage/' . $student->image) : asset('frontend/img/avatar.jpg') }}";
                    return;
                }
                errorMessage.textContent = '';
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush



