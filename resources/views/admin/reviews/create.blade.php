@extends('admin.app')
@section('title')
    Review
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
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Review</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('reviews.index') }}">Reviews</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Review</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('reviews.index') }}" class="add-new">Reviews<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <div class="row">

                            <!-- Student Selection -->
                            <div class="col-md-6">
                                <label for="student_id" class="form-label custom-label">Student</label>
                                <select class="form-select single-select2" name="student_id">
                                    <option value="" disabled selected>Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Course Selection -->
                            <div class="col-md-6">
                                <label for="course_id" class="form-label custom-label">Course</label>
                                <select class="form-select single-select2" name="course_id">
                                    <option value="" disabled selected>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- rating -->
                            <div class="col-md-6">
                                <label for="rating" class="form-label custom-label">Rating</label>
                                <select class="form-select single-select2" name="rating">
                                    <option value="" disabled selected>Select Rating</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- feedback -->
                            <div class="col-12">
                                <label for="feedback" class="form-label custom-label">Feedback</label>
                                <textarea class="form-control custom-input" name="feedback" rows="3" placeholder="Enter Feedback" style="resize: none"></textarea>
                                @error('feedback')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card table-card">
                    <div class="table-header">
                        <div class="table-title">Action</div>
                    </div>
                    <div class="custom-form card-body">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn submit-button">Save
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('reviews.index') }}" class="btn leave-button">Cancel</a>
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
