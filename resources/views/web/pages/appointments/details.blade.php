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
                                <h1 class="text-30 lh-14 pr-60 lg:pr-0">{{ $appointment->title }}</h1>
                            </div>

                            <div class="d-flex items-center pt-20">
                                <div class="bg-image size-30 rounded-full js-lazy loaded" data-ll-status="loaded"
                                  style="background-image: url(&quot;img/avatars/small-1.png&quot;);"></div>
                                <div class="text-14 lh-1 ml-10">{{ $appointment->creator->name }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class="layout-pt-md layout-pb-md">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <div id="overview" class="pt-60 lg:pt-40 to-over">
                            <h4 class="text-18 fw-500">Description</h4>
                            <div class="mt-25">



                                <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-clock-2"></div>
                                        <div class="ml-10">Duration</div>
                                    </div>
                                    <div>{{ $appointment->durationName->timeline }}</div>
                                </div>



                            </div>
                            <div class="show-more mt-30 js-show-more">
                                <div class="show-more__content">
                                    <p class="">
                                        {!!$appointment->description !!}
                                    </p>
                                </div>

                                <button class="d-none show-more__button text-purple-1 fw-500 underline mt-30">Show
                                    more</button>
                            </div>

                        </div>


                    </div>
                    <div class="col-xl-5 col-lg-4">
                        <div class="appointments-single-info  js-pin-content">
                            <div class="bg-white shadow-2 lg-mt-90 rounded-8 border-light mt-90 py-10 px-10">
                                <div class="relative">
                                    <img class="w-1/1"
                                      src="{{ asset('/') }}uploads/appointments/{{ $appointment->image }}" alt="image">
                                    {{-- <div class="absolute-full-center d-flex justify-center items-center">
                                        <a href="https://www.youtube.com/watch?v=ANYfx4-jyqY"
                                          class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery"
                                          data-gallery="gallery1">
                                            <div class="icon-play text-18"></div>
                                        </a>
                                    </div> --}}
                                </div>

                                <div class="appointments-single-info__content scroll-bar-1 pt-30 pb-20 px-20">
                                    <div class="d-flex justify-between items-center mb-30">
                                        <div class="text-24 lh-1 text-dark-1 fw-500">${{ $appointment->price }}</div>
                                    </div>
                                    @php
                                    if(Auth::user()){
                                    $ifpurchased = App\Models\Order::query()->where('type', 1)->where('item_id',
                                    $appointment->id)->where('user_id', Auth::user()->id)->get();
                                    }else {
                                    $ifpurchased = false;
                                    }
                                    @endphp
                                    @if(!$ifpurchased)
                                    <a href="{{route('checkout.store', ['item' => $appointment->id, 'type' => '1'])}}"
                                      class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Buy Now</a>
                                    @else
                                    <button class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Allready
                                        Purchased This Appointment</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

</div>
@endsection