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
                        <h4 class="mb-sm-0 font-size-18">Orders</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Orders</li>
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

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>User</th>
                                        <th>Item</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Phone</th>
                                        <th>Payment Type</th>
                                        <th>Transaction ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $k=>$order)
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        @if ($order->type == 1)
                                        <td><span class="badge badge-soft-info">Appointment</span></td>
                                        @else
                                        <td><span class="badge badge-soft-warning">Product</span></td>
                                        @endif
                                        <td>
                                            @if ($order->status == 1)
                                            <span
                                              class="badge rounded-pill badge-soft-success font-size-11">Active</span>
                                            @elseif ($order->status == 2)
                                            <span class="badge rounded-pill badge-soft-dark font-size-11">Pending</span>
                                            @else
                                            <span
                                              class="badge rounded-pill badge-soft-danger font-size-11">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>
                                            @if ($order->status == 1)
                                            <a class="btn btn-success waves-effect btn-circle waves-light"
                                              href="{{ route('orders.inactive', $order->id) }}">
                                                <i class="fas fa-check"></i> </a>
                                            @elseif($order->status == 2)
                                            <a class="btn btn-success waves-effect btn-circle waves-light"
                                              href="{{ route('orders.pending', $order->id) }}">
                                                accept order </a>
                                            @else
                                            <a class="btn btn-danger waves-effect btn-circle waves-light"
                                              href="{{ route('orders.active', $order->id) }}">
                                                <i class="fa fa-times"></i> </a>
                                            @endif
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
@endsection