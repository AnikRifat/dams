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
                                <h1 class="text-30 lh-14 pr-60 lg:pr-0">Purchase Lists</h1>
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
                        <table class="table w-1/1">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Item type</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Order time</th>
                                    <th>Print Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($purchasedData as $item)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td> @if ($item['type'] == 'Appointment')
                                        <span class="px-15 rounded-200 bg-dark-1 text-white">{{ $item['type'] }}</span>
                                        @else
                                        <span
                                          class="px-15 rounded-200 bg-purple-1  text-white">{{ $item['type'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $item['item_title'] }}</td>
                                    <td>${{ $item['amount'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>
                                        <a href="{{ route('generate.invoice',$item['order_no']) }}"
                                          class="button -icon -purple-1 text-white">print</a>
                                        <a href="{{ route('generate.view',$item['order_no']) }}"
                                          class="button -icon -green-1 text-white">view</a>
                                    </td>
                                </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>
@endsection