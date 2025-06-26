@extends('admin.app')
@section('title')
Our Team
@endsection
@section('content')


<div class="container-fluid my-3">
    <form action="{{ route('our-teams.update', ['our_team' => $ourTeam->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Our Team</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('our-teams.index')}}">Our Team</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Our Team</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('our-teams.index')}}" class="add-new">Our Team<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>
                    <div class="card-body custom-form">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Name</label>
                                <input type="text" class="form-control custom-input" name="name" value="{{$ourTeam->name}}">
                                @if($errors->has('name'))
                                    <div class="error_msg">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Email</label>
                                <input type="email" class="form-control custom-input" name="email" value="{{$ourTeam->email}}">
                                @if($errors->has('email'))
                                    <div class="error_msg">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Phone</label>
                                <input type="text" class="form-control custom-input" name="phone" value="{{$ourTeam->phone}}">
                                @if($errors->has('phone'))
                                    <div class="error_msg">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Designation</label>
                                <input type="text" class="form-control custom-input" name="designation" value="{{$ourTeam->designation}}">
                                @if($errors->has('designation'))
                                    <div class="error_msg">
                                        {{ $errors->first('designation') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Facebook</label>
                                <input type="text" class="form-control custom-input" name="facebook" value="{{$ourTeam->facebook}}">
                                @if($errors->has('facebook'))
                                    <div class="error_msg">
                                        {{ $errors->first('facebook') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">Twitter</label>
                                <input type="text" class="form-control custom-input" name="twitter" value="{{$ourTeam->twitter}}">
                                @if($errors->has('twitter'))
                                    <div class="error_msg">
                                        {{ $errors->first('twitter') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label custom-label">LinkedIn</label>
                                <input type="text" class="form-control custom-input" name="linkedin" value="{{$ourTeam->linkedin}}">
                                @if($errors->has('linkedin'))
                                    <div class="error_msg">
                                        {{ $errors->first('linkedin') }}
                                    </div>
                                @endif
                            </div>



                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12 order-last order-md-first">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Update
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('our-teams.index')}}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Team Member Image</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="image-select-file">
                                    <label class="form-label custom-label" for="cover_image">
                                        <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                        <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                        <div class="user-image">
                                            <img id="cover_imagePreview" src="{{ $ourTeam->image ? asset('storage/'.$ourTeam->image) : asset('admin/images/default.jpg') }}" alt="image" class="image-preview">
                                            <span class="formate-error cover_imageerror"></span>
                                        </div>
                                        <span class="upload-btn">Upload Image</span>
                                    </label>
                                </div>

                                <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                @if($errors->has('cover_image'))
                                    <div class="error_msg">
                                        {{ $errors->first('cover_image') }}
                                    </div>
                                @endif
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
     
    {{-- image upload and preview js --}}
    <script>
        function imageUpload( e ) {
            console.log(e);
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).attr( 'src', "" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).removeClass( 'd-none' );
                    $( '#' + id + 'PreviewNo' ).addClass( 'd-none' );
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            $( "#" + id ).val( null );
            // $( '#' + id + 'Preview' ).attr( 'class', noImage  );
            $( '#' + id + 'Preview' ).addClass( 'd-none' );
            $( '#' + id + 'PreviewNo' ).removeClass( 'd-none' );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>

@endpush
