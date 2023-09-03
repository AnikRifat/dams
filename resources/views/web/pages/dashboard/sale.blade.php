@extends('web.app.app')


@section('main-body')

<div class="content-wrapper  js-content-wrapper">


    <div class="js-pin-container">
        <section class="page-header -type-5 bg-light-6">

            <div class="container">
                <div class="page-header__content pt-90 pb-90">
                    <div class="row y-gap-30 relative" style="">
                        <div class="col-xl-12 col-lg-12">


                            <div data-anim="slide-up delay-1" class="is-in-view">
                                <h1 class="text-30 lh-14 pr-60 lg:pr-0">Sale Lists</h1>
                            </div>

                            <div class="d-flex items-center pt-20">
                                <div class="bg-image size-30 rounded-full js-lazy loaded" data-ll-status="loaded"
                                  style="background-image: url(&quot;img/avatars/small-1.png&quot;);"></div>
                                <div class="text-14 lh-1 ml-10"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class="layout-pt-md layout-pb-md">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-18 lh-1 text-dark-1 fw-500 mb-30">Table</div>
                        <table class="table w-1/1">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Order No.</th>
                                    <th>Appointment Title</th>
                                    <th>Appointment Amount</th>
                                    <th>Patient Name</th>
                                    <th>Profit Amount</th>
                                    <th>Order Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($saleData as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['order_no'] }}</td>
                                    <td>{{ $item['appointmenttitle'] }}</td>
                                    <td>{{ $item['appointment_amount'] }}</td>
                                    <td>{{ $item['patient_name'] }}</td>
                                    <td>{{ $item['profit_amount'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="total-profit-amount">
                            <strong>Total Profit Amount:</strong> ${{ $totalProfitAmount }}
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

</div>
@endsection