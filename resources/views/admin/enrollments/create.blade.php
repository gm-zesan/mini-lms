@extends('admin.app')
@section('title')
    Enrollment
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
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Enrollment</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('enrollments.index') }}">Enrollments</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Enrollment</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('enrollments.index') }}" class="add-new">Enrollments<i class="ms-1 ri-list-ordered-2"></i></a>
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

                            <!-- Payment Method -->
                            <div class="col-md-6">
                                <label for="payment_method" class="form-label custom-label">Payment Method</label>
                                <select class="form-select single-select2" name="payment_method">
                                    <option value="" disabled selected>Select Payment Method</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                                @error('payment_method')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Transaction ID -->
                            <div class="col-md-6">
                                <label for="transaction_id" class="form-label custom-label">Transaction ID</label>
                                <input type="text" class="form-control custom-input" name="transaction_id" placeholder="Enter Transaction ID">
                                @error('transaction_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Total Amount -->
                            <div class="col-md-6">
                                <label for="total_amount" class="form-label custom-label">Total Amount</label>
                                <input type="number" class="form-control custom-input" name="total_amount" placeholder="Enter Total Amount" step="0.01">
                                @error('total_amount')
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
                                <a href="{{ route('enrollments.index') }}" class="btn leave-button">Cancel</a>
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
