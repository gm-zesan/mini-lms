@extends('admin.app')
@section('title')
    Courses
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
                            <div class="table-title">Courses</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Courses</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('courses.create') }}" class="add-new">Create Course<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 8%">SL NO</th>
                                    <th scope="col" style="width: 15%">Title</th>
                                    <th scope="col" style="width: 8%">Price</th>
                                    <th scope="col" style="width: 12%">Starting Date</th>
                                    <th scope="col" style="width: 12%">Ending Date</th>
                                    <th scope="col" style="width: 22%">Description</th>
                                    <th scope="col" style="width: 8%">Certificate</th>
                                    <th scope="col" style="width: 10%">Action</th>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/courses';

        $(document).ready(function () {
            var table = $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                "pageLength": 20,
                "lengthMenu": [20, 50, 100, 500],
                ajax: {
                    url: listUrl,
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'title', name: 'title', orderable: true },
                    { data: 'price', name: 'price', orderable: true },
                    { data: 'starting_date', name: 'starting_date', orderable: true },
                    { data: 'end_date', name: 'end_date', orderable: true },
                    { data: 'description',
                        name: 'description',
                        orderable: false,
                        render: function (data) {
                            var tmp = document.createElement("div");
                            tmp.innerHTML = data;
                            $content = tmp.textContent || tmp.innerText || "";
                            var regex = /(<([^>]+)>)/ig;
                            var body = $content.replace(regex, "");
                            return body.length > 200 ? body.substring(0, 200) + "..." : body;
                        }
                    },
                    {
                        data: 'is_certificate_enabled',
                        name: 'is_certificate_enabled', 
                        orderable: false, 
                        render: function (data, type, row) {
                            var btns = '<div class="action-btn">';
                            if (data.is_certificate_enabled == 1) {
                                btns += '<a href="' + SITEURL + '/dashboard/courses/' + data.id + '/certificate-status" title="Enabled Certificates" class="btn btn-show"><i class="ri-checkbox-circle-line"></i></a>';
                            } else {
                                btns += '<a href="' + SITEURL + '/dashboard/courses/' + data.id + '/certificate-status" title="Disabled Certificates" class="btn btn-delete"><i class="ri-close-circle-line"></i></a>';
                            }

                            btns += '</div>';
                            return btns;
                        }
                    },
                    {
                        data: 'id', 
                        orderable: false, 
                        render: function (data) {
                            var btns = '<div class="action-btn">';
                                btns += '<a href="' + SITEURL + '/dashboard/courses/' + data + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                                
                                btns += '<a href="' + SITEURL + '/dashboard/courses/' + data + '/email" title="Send Email" class="btn btn-show"><i class="ri-mail-line"></i></a>';

                                btns += '<form action="' + SITEURL + '/dashboard/courses/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this course?\');">' +
                                    '@csrf' +
                                    '@method("DELETE")' +
                                    '<button type="submit" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></button>' +
                                '</form>';
                            btns += '</div>';
                            return btns;
                        }
                    }
                ],
                order: [[0, 'asc']],
            });
        });
    </script>
@endpush
