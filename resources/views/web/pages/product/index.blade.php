@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">Shop List</h1>

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
            <div class="row x-gap-60">


                <div class="col-lg-12">
                    <div class="row y-gap-10 justify-between items-center">
                        <div class="col-auto">
                            <div class="text-14">
                                Showing <span class="fw-500 text-dark-1">250</span> total results
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="fw-500 text-dark-1 mr-20">
                                    Sort by:
                                </div>

                                <div class="dropdown js-shop-dropdown">
                                    <div class="d-flex items-center text-14">
                                        <span class="js-dropdown-title">
                                            Default Sorting
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          class="feather feather-chevron-down icon size-20 ml-40">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>

                                    <div class="dropdown__item">
                                        <div class="text-14 y-gap-15 js-dropdown-list">
                                            <div>
                                                <a class="d-block decoration-none js-dropdown-link" href="#">Default
                                                    Sorting</a>
                                            </div>
                                            <div>
                                                <a class="d-block decoration-none js-dropdown-link"
                                                  href="#">Clothing</a>
                                            </div>
                                            <div>
                                                <a class="d-block decoration-none js-dropdown-link" href="#">Glasses</a>
                                            </div>
                                            <div>
                                                <a class="d-block decoration-none js-dropdown-link"
                                                  href="#">T-Shirts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('web.component.product')

                    <div class="row justify-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <div class="pagination -buttons">
                                <button class="pagination__button -prev">
                                    <i class="icon icon-chevron-left"></i>
                                </button>

                                <div class="pagination__count">
                                    <a href="#">1</a>
                                    <a class="-count-is-active" href="#">2</a>
                                    <a href="#">3</a>
                                    <span>...</span>
                                    <a href="#">67</a>
                                </div>

                                <button class="pagination__button -next">
                                    <i class="icon icon-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection