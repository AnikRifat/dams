@extends('admin.app.app')

@section('styles')
<!-- DataTables -->
<link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
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
                        <h4 class="mb-sm-0 font-size-18">Patients</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Patients</li>
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

                            <table id="datatable-buttons" class="table table-busered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>status</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>

                                        {{-- <th>Type</th>
                                        <th>Status</th>
                                        <th>Phone</th>
                                        <th>Payment Type</th>
                                        <th>Transaction ID</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            @if ($user->allow == 0)
                                            <span class="badge rounded-pill badge-soft-success font-size-11">Need
                                                Cormation</span>
                                            @else
                                            <span
                                              class="badge rounded-pill badge-soft-danger font-size-11">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <button type="button"
                                              class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                              data-bs-toggle="modal"
                                              data-bs-target=".transaction-detailModal-{{ $user->id }}">
                                                View Details
                                            </button>
                                        </td>

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
@foreach ($users as $user)
<div class="modal fade bs-example-modal-lg transaction-detailModal-{{ $user->id }}" tabindex="-1"
  aria-labelledby="transaction-detailModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">User Name: <span class="text-primary">{{ $user->name }}</span></p>
                <p class="mb-4">User Email: <span class="text-primary">{{ $user->email }}</span></p>
                <p class="mb-4">User Phone: <span class="text-primary">{{ $user->phone }}</span></p>
                <p class="mb-4">User document: <span class="text-primary">{{ $user->phone }}</span></p>
                @if($user->patient)
                <img src="{{ asset('') }}uploads/patients/{{ $user->patient->image }}" height="200" alt="">
                <p class="mb-4">User birthday: <span class="text-primary">{{ $user->patient->birthday }}</span></p>
                <p class="mb-4">User Depertment: <span
                      class="text-primary">{{ $user->patient->current_department }}</span></p>
                <p class="mb-4">User Class: <span class="text-primary">{{ $user->patient->current_class }}</span>
                <p class="mb-4">User school: <span class="text-primary">{{ $user->patient->current_school }}</span>
                    @else
                <h3 class="text-bold text-danger">Profile not completed yet</h3>
                @endif


            </div>
            <div class="modal-footer">
                <a href="{{ route('users.confirm',$user->id) }}" class="btn btn-success">Accept</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

{{-- @section('scripts')
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
@endsection --}}