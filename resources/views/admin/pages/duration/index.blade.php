@extends('admin.app.app')
@section('styles')
<!-- DataTables -->
<link href="{{ asset('') }}assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
  type="text/css" />
<link href="{{ asset('') }}assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
  type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('') }}assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
  rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Duration</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Duration</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('durations.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="timeline" class="form-label">Timeline</label>
                                        <input type="text" class="form-control" id="timeline" name="timeline" required>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">



                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>status</th>
                                    <th>Timeline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($durations as $duration)
                                <tr>
                                    <td>
                                        @if ($duration->status == 1)
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Active</span>
                                        @else
                                        <span class="badge rounded-pill badge-soft-danger font-size-11">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $duration->timeline }}</td>



                                    <td>
                                        @if ($duration->status == 1)
                                        <a class="btn btn-success waves-effect btn-circle waves-light"
                                          href="{{ route('durations.inactive', $duration->id) }}">
                                            <i class="fas fa-check"></i> </a>
                                        @else
                                        <a class="btn btn-danger waves-effect btn-circle waves-light"
                                          href="{{ route('durations.active', $duration->id) }}">
                                            <i class="fa fa-times"></i> </a>
                                        @endif

                                        <a class="btn btn-primary waves-effect btn-circle waves-light"
                                          href="{{ route('durations.edit', $duration->id) }}">
                                            <i class="fa fa-edit"></i> </a>
                                        <form hidden action="{{ route('durations.destroy', $duration->id) }}"
                                          id="form{{ $duration->id }}" method="get">
                                            @csrf
                                        </form>
                                        <button class="btn btn-danger waves-effect btn-circle waves-light"
                                          onclick="deleteItem({{ $duration->id }});" type="button">
                                            <i class="fa fa-trash"></i> </button>
                                    </td>
                                    {{-- <td>
                                            <a href="{{ route('durations.edit', $duration->id) }}" class="btn btn-sm
                                    btn-warning">Edit</a>
                                    <form action="{{ route('durations.destroy', $duration->id) }}" method="POST"
                                      style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                          onclick="return confirm('Are you sure you want to delete this duration?')">Delete</button>
                                    </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->


</div>
@endsection
@section('scripts')
<script>
    function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('ok');
                    document.getElementById(`form${id}`).submit();
                }
            })
        }
</script>
@endsection