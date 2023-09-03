@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">Shop Checkout</h1>

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
                <div class="col-lg-8">
                    <div class="shopCheckout-form">
                        <form action="post" class="contact-form row x-gap-30 y-gap-30">
                            <div class="col-12">
                                <h5 class="text-20">Billing details</h5>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">First name</label>
                                <input type="text" name="firstName" placeholder="First name">
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Last name</label>
                                <input type="text" name="lastName" placeholder="Last name">
                            </div>
                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Company name</label>
                                <input type="text" name="company" placeholder="Company name">
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Country / Region *</label>
                                <select class="selectize wide js-selectize">
                                    <option value="USA">USA</option>
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                    <option value="Greece">Greece</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">House number adn street
                                    name</label>
                                <input type="text" name="address" placeholder="House number adn street name">
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Apartment, suite, unit etc.
                                    (optional)</label>
                                <input type="text" name="apartment"
                                  placeholder="Apartment, suite, unit etc. (optional)">
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Town / City *</label>
                                <input type="text" name="city" placeholder="Town / City *">
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">State *</label>
                                <input type="text" name="state" placeholder="State *">
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">ZIP *</label>
                                <input type="text" name="zip" placeholder="ZIP *">
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone *</label>
                                <input type="tel" name="phone" placeholder="Phone *">
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email address *</label>
                                <input type="email" name="email" placeholder="Email address *">
                            </div>

                            <div class="col-12">
                                <h5 class="text-20 fw-500 pt-30">Additional information</h5>
                            </div>
                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Order notes (optional)</label>
                                <textarea name="notes" id="form_notes" rows="8"
                                  placeholder="Order notes (optional)"></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <div class="pt-30 pb-15 bg-white border-light rounded-8 bg-light-4">
                            <h5 class="px-30 text-20 fw-500">
                                Your order
                            </h5>

                            <div class="d-flex justify-between px-30 mt-25">
                                <div class="py-15 fw-500 text-dark-1">Product</div>
                                <div class="py-15 fw-500 text-dark-1">Subtotal</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 text-grey">Hoodie x2</div>
                                <div class="py-15 text-grey">$59.00</div>
                            </div>

                            <div class="d-flex justify-between px-30">
                                <div class="py-15 text-grey">Seo Books x 1</div>
                                <div class="py-15 text-grey">$67.00</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500">Subtotal</div>
                                <div class="py-15 fw-500">$178.00</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500 text-dark-1">Shipping</div>
                                <div class="py-15 fw-500 text-dark-1">$178.00</div>
                            </div>

                            <div class="d-flex justify-between border-top-dark px-30">
                                <div class="py-15 fw-500 text-dark-1">Total</div>
                                <div class="py-15 fw-500 text-dark-1">$9,218.00</div>
                            </div>
                        </div>

                        <div class="py-30 px-30 bg-white mt-30 border-light rounded-8 bg-light-4">
                            <h5 class="text-20 fw-500">
                                Payment
                            </h5>

                            <div class="mt-30">
                                <div class="form-radio d-flex items-center">
                                    <div class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <div class="radio__mark">
                                            <div class="radio__icon"></div>
                                        </div>
                                    </div>
                                    <h5 class="ml-15 text-15 lh-1 fw-500 text-dark-1">Direct bank transfer</h5>
                                </div>
                                <p class="ml-25 pl-5 mt-25">Make your payment directly into our bank account. Please use
                                    your Order ID as the payment reference. Your order will not be shipped until the
                                    funds have cleared in our account.</p>
                            </div>

                            <div class="mt-30">
                                <div class="form-radio d-flex items-center">
                                    <div class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <div class="radio__mark">
                                            <div class="radio__icon"></div>
                                        </div>
                                    </div>
                                    <h5 class="ml-15 text-15 lh-1 text-dark-1">Check payments</h5>
                                </div>
                            </div>

                            <div class="mt-30">
                                <div class="form-radio d-flex items-center">
                                    <div class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <div class="radio__mark">
                                            <div class="radio__icon"></div>
                                        </div>
                                    </div>
                                    <h5 class="ml-15 text-15 lh-1 text-dark-1">Cash on delivery</h5>
                                </div>
                            </div>

                            <div class="mt-30">
                                <div class="form-radio d-flex items-center">
                                    <div class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <div class="radio__mark">
                                            <div class="radio__icon"></div>
                                        </div>
                                    </div>
                                    <h5 class="ml-15 text-15 lh-1 text-dark-1">PayPal</h5>
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