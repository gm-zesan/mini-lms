@extends('admin.app')
@section('title')
    Course
@endsection

@push('custom-style')
    <style>
        .select2-container--default .select2-search--inline .select2-search__field {
            font-size: 12px;
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid my-3">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Course</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('courses.index') }}">Courses</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Course</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('courses.index') }}" class="add-new">Courses<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        <div class="row">
                            <div class="col-12">
                                <label for="title" class="form-label custom-label">Title</label>
                                <input type="text" class="form-control custom-input" name="title" placeholder="Course Title">
                                @error('title')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="type" class="form-label custom-label">Type</label>
                                <select class="form-select single-select2" name="type">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="recorded">Recorded</option>
                                    <option value="live">Live</option>
                                </select>
                                @error('type')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <div class="col-md-6">
                                <label for="price" class="form-label custom-label">Price</label>
                                <input type="number" class="form-control custom-input" name="price" placeholder="Course Price" step="0.01">
                                @error('price')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="starting_date" class="form-label custom-label">Starting Date</label>
                                <input type="date" class="form-control custom-input" name="starting_date">
                                @error('starting_date')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="end_date" class="form-label custom-label">End Date</label>
                                <input type="date" class="form-control custom-input" name="end_date">
                                @error('end_date')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="total_seats" class="form-label custom-label">Total Seats</label>
                                <input type="number" class="form-control custom-input" name="total_seats" placeholder="Total Seats">
                                @error('total_seats')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="total_lessons" class="form-label custom-label">Total Lessons</label>
                                <input type="number" class="form-control custom-input" name="total_lessons" placeholder="Total Lessons">
                                @error('total_lessons')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="teacher_ids" class="form-label custom-label">Teachers</label>
                                <select class="form-select multiple-select2" name="teacher_ids[]" multiple>
                                    <option value="" disabled>Select Teachers</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_ids')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="main_teacher_id" class="form-label custom-label">Main Teacher</label>
                                <select class="form-select single-select2" name="main_teacher_id">
                                    <option value="" disabled selected>Select Main Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('main_teacher_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label custom-label">Description</label>
                                <textarea class="form-control custom-input" name="description" id="description" rows="5" placeholder="Course Description" style="resize: none; height: auto"></textarea>
                                @error('description')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="what_will_learn" class="form-label custom-label">What Will You Learn</label>
                                <textarea class="form-control custom-input" name="what_will_learn" rows="3" id="what_will_learn" rows="5" placeholder="What will you learn" style="resize: none; height: auto"></textarea>
                                @error('what_will_learn')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label custom-label">Prerequisites</label>
                                <textarea class="form-control custom-input" name="prerequisites" rows="3" id="prerequisites" rows="5" placeholder="Course prerequisites"  style="resize: none; height: auto"></textarea>
                                @error('prerequisites')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="time_schedule" class="form-label custom-label">Time Schedule</label>
                                <textarea class="form-control custom-input" name="time_schedule" rows="3" id="time_schedule" rows="5" placeholder="Course time schedule" style="resize: none; height: auto"></textarea>
                                @error('time_schedule')
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
                                        <button type="submit" class="btn submit-button">Save
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

                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Course Image</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="image-select-file">
                                    <label class="form-label custom-label" for="image">
                                        <input type="hidden" id="image_data" name="image_data">
                                        <input type="file" id="image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                        <div class="user-image">
                                            <img id="imagePreview" src="{{ asset('admin/images/default.jpg') }}" alt="" class="image-preview">
                                            <span class="formate-error imageerror"></span>
                                        </div>
                                        <span class="upload-btn">Upload Image</span>
                                    </label>
                                </div>
                                <div class="delete-btn mt-2 d-none remove-image" id="imageDelete" onclick="removeImage('image')">Remove image</div>
                                @error('image')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
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
    {{-- CK Editor --}}
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        setTimeout(function(){
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('what_will_learn', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('prerequisites', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('time_schedule', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        },100);
    </script>

    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });

        function imageUpload(e) {
            var imgPath = e.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL(e, e.id);
                $('.' + e.id + 'error').hide();
                $('#' + e.id + 'Delete').removeClass('d-none');
            } else {
                $('.' + e.id + 'error').html('Select a jpg, jpeg, png type image file.').show();
                $("#" + e.id + "_data").val("");
                $('#' + e.id + 'Preview').attr('src', "");
                $('#' + e.id).val(null);
                $('#' + e.id + 'Delete').addClass('d-none');
            }
        }

        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + id + 'Preview').attr('src', e.target.result).show();
                    $('#' + id + 'Delete').removeClass('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        var noImage = "{{ asset('admin/images/default.jpg') }}";
        function removeImage(id) {
            $("#" + id).val(null);
            $('#' + id + 'Preview').attr('src', noImage);
            $('#' + id + 'Delete').addClass('d-none');
        }
    </script>
@endpush
