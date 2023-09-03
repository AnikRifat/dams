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
                        <h4 class="mb-sm-0 font-size-18">Transactions</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Sales Data</li>
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
                                        <th>Action</th>
                                        <th>Invoice</th>
                                        <th>Order No.</th>
                                        <th>Type</th>
                                        <th>Item Title</th>
                                        <th>Invoice ID</th>
                                        <th>Seller</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody id="salesData">
                                    <!-- Table rows will be dynamically added here -->
                                    @foreach ($salesData as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('generate.invoice',$item['order_no']) }}"
                                              class="btn btn-sm btn-warning">print</a>
                                            <a href="{{ route('generate.view',$item['order_no']) }}"
                                              class="btn btn-sm btn-info">view</a>
                                        </td>
                                        <td>{{ $item['invoice'] }}</td>
                                        <td>{{ $item['order_no'] }}</td>
                                        <td> @if ($item['type'] == 'Appointment')
                                            <span
                                              class="badge rounded-pill badge-soft-primary font-size-11">{{ $item['type'] }}</span>
                                            @else
                                            <span
                                              class="badge rounded-pill badge-soft-warning font-size-11">{{ $item['type'] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item['item_title'] }}</td>
                                        <td>{{ $item['invoice'] }}</td>
                                        <td>{{ $item['seller'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
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