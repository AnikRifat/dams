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
                                <li class="breadcrumb-item active">Shop Ledger sheet</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row mt-3">

                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="filterDoctor" class="form-label">Filter by patients</label>
                        <select id="filterDoctor" class="form-select">
                            <option value="0">All patients</option>
                            @foreach ($patients as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                            <!-- Add options for doctors here -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button id="filterButton" class="btn btn-primary">Filter</button>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Invoice ID</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Ratio</th>

                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <!-- Update the table body to an empty tbody -->
                                <tbody id="filteredData">
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->order->product->name }}</td>
                                        <td>{{ $transaction->invoice }}</td>
                                        <td>{{ $transaction->patient->name }}</td>
                                        <td>
                                            {{ $transaction->amount }}

                                        </td>

                                        <td>{{ $transaction->ratio }} %</td>

                                        <td>{{ $transaction->created_at->format('d-m-y h:i:a')}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                                <!-- Add this script to load data using AJAX -->
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



<!-- ... (your existing code) -->

@section('scripts')
<!-- ... (your existing code) -->

<script>
    $(document).ready(function() {
    // Function to fetch data based on selected filters
    function fetchData() {
        var patientId = $('#filterDoctor').val();

        // Send AJAX request
        $.ajax({
            url: '{{ url('api/shopfilter') }}',
            type: 'GET',
            data: {
                patientId: patientId,
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // Check if the response is an array
                if (Array.isArray(response)) {
                    updateTable(response);
                } else {
                    console.error('Invalid response format. Expected an array.');
                }
            },
            error: function(error) {
                // Handle error if needed
                console.error('Error occurred during AJAX request:', error);
            }
        });
    }

    // Update the table on page load
    // fetchData();

    // Add event listeners to update the table whenever filters change
    $('#filterButton').click(function() {
        // console.log('ok');
        fetchData();
    });

    function updateTable(data) {
        // Clear the existing table data
        $('#filteredData').empty();

        // Loop through the data and add rows to the table
        data.forEach(function(item) {
            var row = '<tr>';
            row += '<td>' + item.appointmenttitle + '</td>';
            row += '<td>' + item.invoice + '</td>';
            row += '<td>' + item.patient_name + '</td>';
            row += '<td>' + item.amount + '</td>';
            row += '<td>' + item.ratio + ' %</td>';
            row += '<td>' + item.created_at + '</td>';
            row += '</tr>';
            $('#filteredData').append(row);
        });
    }
});

</script>
@endsection

<!-- ... (your existing code) -->