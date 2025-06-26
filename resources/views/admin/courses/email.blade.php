@extends('admin.app')
@section('title')
    E-Mail
@endsection

@push('custom-style')
    <style>
        .select2-container.select2-container--default {
            max-width: 694.656px;
            width: 100% !important;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid my-3">
    <form action="{{ route('course.send-email') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">E-Mail</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('courses.index') }}">Courses</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Send E-Mail</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('courses.index') }}" class="add-new">Courses<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <div class="info text-center mb-5">
                            <h4>{{ $course->title }}</h4>
                            <p>
                                Send email to all enrolled students with <br> Google Classroom Code.
                            </p>
                        </div>
                        <div class="row justify-content-center">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="col-md-6 col-12">
                                <label for="google_classroom_code" class="form-label custom-label">Google Classroom Code</label>
                                <input type="text" class="form-control custom-input" name="google_classroom_code" placeholder="Google Classroom Code" value="{{ $course->google_classroom_code }}">
                                @error('google_classroom_code')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Send Email
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('courses.index') }}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('custom-scripts')

    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
