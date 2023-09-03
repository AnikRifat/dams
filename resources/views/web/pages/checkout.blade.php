@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">Checkout</h1>

                        </div>

                        <div data-anim="slide-up delay-2" class="is-in-view">

                            <p class="page-header__text">We’re on a mission to deliver engaging, curated appointments at
                                a
                                reasonable price.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50">
                <div class="col-lg-12">
                    <div class="shopCheckout-form">
                        <form action="post" class="contact-form row x-gap-30 y-gap-30">
                            <div class="col-12">
                                <h5 class="text-20">Billing details</h5>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">name</label>
                                <input type="text" name="name" placeholder="name" value="{{ Auth::user()->name }}"
                                  readonly>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email</label>
                                <input type="text" name="email" placeholder="email" value="{{ Auth::user()->email }}"
                                  readonly>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone</label>
                                <input type="tel" name="phone" placeholder="phone" value="{{ Auth::user()->phone }}"
                                  readonly>
                            </div>
                            @if (Auth::user()->role == 1)
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address</label>
                                <input type="text" name="address" placeholder="address"
                                  value="{{ Auth::user()->patient->address }}" readonly>
                            </div>
                            @elseif(Auth::user()->role == 2)
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address</label>
                                <input type="text" name="address" placeholder="address"
                                  value="{{ Auth::user()->doctor->address }}" readonly>
                            </div>
                            @endif



                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="">
                        <div class="pt-30 pb-15 bg-white border-light rounded-8 bg-light-4">
                            <h5 class="px-30 text-20 fw-500">
                                @if($type == 1)
                                Appointment Checkout
                                @elseif($type == 2)
                                Product Checkout
                                @endif
                            </h5>

                            <div class="d-flex justify-between px-30 mt-25">
                                <div class="py-15 fw-500 text-dark-1">Product</div>
                                <div class="py-15 fw-500 text-dark-1">Price</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                @if ($type == 1)
                                <div class="py-15 text-grey">{{ $singleItem->title }}</div>
                                @else
                                <div class="py-15 text-grey">{{ $singleItem->name }}</div>
                                @endif

                                <div class="py-15 text-grey">${{ $singleItem->price}}</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500">Subtotal</div>
                                <div class="py-15 fw-500">${{ $singleItem->price}}</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500 text-dark-1">Shipping</div>
                                <div class="py-15 fw-500 text-dark-1">${{ $singleItem->price}}</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500 text-dark-1">Total</div>
                                <div class="py-15 fw-500 text-dark-1">${{ $singleItem->price}}</div>
                            </div>
                        </div>

                        <div class="py-30 px-30 bg-white mt-30 border-light rounded-8 bg-light-4">
                            <h5 class="text-20 fw-500">
                                Payment
                            </h5>

                            <div class="container">
                                <div class="tabs tabs--pills js-tabs">
                                    <div
                                      class="tabs__controls d-flex justify-content-around gap-2 mt-3 js-tabs-controls">
                                        <button class="tabs__button px-3 py-2 rounded-3 text-light js-tabs-button"
                                          data-tab-target=".-tab-item-1" type="button">
                                            <img src="{{ asset('/') }}assets/web/img/bkash_logo.png" alt="Bkash Logo"
                                              class="payment-logo">
                                        </button>
                                        <button class="tabs__button px-3 py-2 rounded-3 text-light js-tabs-button"
                                          data-tab-target=".-tab-item-2" type="button">
                                            <img src="{{ asset('/') }}assets/web/img/nagad_logo.png" alt="Nagad Logo"
                                              class="payment-logo">
                                        </button>
                                        <button
                                          class="tabs__button px-3 py-2 rounded-3 text-light js-tabs-button is-active"
                                          data-tab-target=".-tab-item-3" type="button">
                                            <img src="{{ asset('/') }}assets/web/img/rocket_logo.png" alt="Rocket Logo"
                                              class="payment-logo">
                                        </button>
                                    </div>

                                    <div class="tabs__content mt-4 js-tabs-content">
                                        <div class="tabs__pane -tab-item-1">
                                            <!-- Bkash Payment Form -->
                                            <form class="contact-form" action="{{ route('order.store') }}"
                                              method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $type }}" name="type">
                                                <input type="hidden" name="price" value="{{ $singleItem->price}}">
                                                @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title}}">
                                                @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name}}">
                                                @endif

                                                <input type="hidden" name="payment_type" value="Bkash">
                                                <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                                <div class="mb-3">
                                                    <label for="bkash-phone" class="form-label">Phone No.</label>
                                                    <input type="text" id="bkash-phone" name="phone"
                                                      class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bkash-transaction-id" class="form-label">Transaction
                                                        ID</label>
                                                    <input type="text" id="bkash-transaction-id" name="transaction_id"
                                                      class="form-control" required>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="button -icon -red-1 text-white">Pay
                                                        with
                                                        Bkash</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tabs__pane -tab-item-2">
                                            <!-- Nagad Payment Form -->
                                            <form class="contact-form" action="{{ route('order.store') }}"
                                              method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $type }}" name="type">
                                                <input type="hidden" name="price" value="{{ $singleItem->price}}">
                                                @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title}}">
                                                @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name}}">
                                                @endif
                                                <input type="hidden" name="payment_type" value="Nagad">
                                                <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                                <div class="mb-3">
                                                    <label for="nagad-phone" class="form-label">Phone No.</label>
                                                    <input type="text" id="nagad-phone" name="phone" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nagad-transaction-id" class="form-label">Transaction
                                                        ID</label>
                                                    <input type="text" id="nagad-transaction-id" name="transaction_id"
                                                      class="form-control" required>
                                                </div>
                                                <div class="text-center">

                                                    <button type="submit" class="button -icon -orange-1 text-white">Pay
                                                        with
                                                        Nagad</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tabs__pane -tab-item-3 is-active">
                                            <!-- Rocket Payment Form -->
                                            <form class="contact-form" action="{{ route('order.store') }}"
                                              method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $type }}" name="type">
                                                <input type="hidden" name="price" value="{{ $singleItem->price}}">
                                                @if ($type == 1)
                                                <input type="hidden" name="name" value="{{ $singleItem->title}}">
                                                @else
                                                <input type="hidden" name="name" value="{{ $singleItem->name}}">
                                                @endif
                                                <input type="hidden" name="payment_type" value="Rocket">
                                                <input type="hidden" value="{{ $singleItem->id }}" name="item_id">
                                                <div class="mb-3">
                                                    <label for="rocket-phone" class="form-label">Phone No.</label>
                                                    <input type="text" id="rocket-phone" name="phone"
                                                      class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rocket-transaction-id" class="form-label">Transaction
                                                        ID</label>
                                                    <input type="text" id="rocket-transaction-id" name="transaction_id"
                                                      class="form-control" required>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="button -icon -purple-1 text-white">Pay
                                                        with
                                                        Rocket</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-30">
                                <button class="button -md -accent col-12 -uppercase text-white">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>
@endsection