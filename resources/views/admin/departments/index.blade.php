@extends('admin.app')
@section('title')
    Department
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush



@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Department</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('departments')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Department</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('department.create')}}" class="add-new">Create Department<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
    {{-- sweet alert --}}
    @if(Session::has('success'))
        <script>
            swal("success", "{{ Session::get('success') }}", "success", {
                timer: 1000,
                button: false,
            });
        </script>
    @endif
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/department';

        $(document).ready( function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [ 20, 50, 100, 500 ],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'description',
                        name: 'description',
                        orderable: true,
                        render: function (data) {
                            var tmp = document.createElement("div");
                            tmp.innerHTML = data;
                            $content = tmp.textContent || tmp.innerText || "";
                            // remove img tag from string
                            var regex = /(<([^>]+)>)/ig;
                            var body = $content.replace(regex, "");
                            return body.length > 400 ? body.substring(0, 400) + "..." : body;
                        }
                    },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/department/edit/' + data + '"title="edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="' + SITEURL + '/dashboard/department/delete/' + data + '" title="delete" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                            
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']],
            });
        });
    </script>
@endpush
