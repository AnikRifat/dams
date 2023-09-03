@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="layout-pt-lg layout-pb-md">
        <div class="container">
            <div class="row y-gap-60 justify-between items-center">
                <div class="col-lg-6">
                    <div class="js-shop-slider">
                        <div
                          class="shopSingle-preview__image js-slider-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-28aa10385e2975e6d" aria-live="polite">

                                <div class="swiper-slide swiper-slide-visible swiper-slide-active" role="group"
                                  aria-label="1 / 4" style="width: 630px;">
                                    <a data-barba="" href="{{ asset('/') }}uploads/products/{{ $product->image }}"
                                      class="gallery__item js-gallery" data-gallery="gallery1">
                                        <div class="ratio ratio-63:57">
                                            <img class="absolute-full-center rounded-8"
                                              src="{{ asset('/') }}uploads/products/{{ $product->image }}"
                                              alt="project image">
                                        </div>

                                        <div class="gallery__button -bottom-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"
                                              class="feather feather-plus icon">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </div>
                                    </a>
                                </div>



                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>


                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="pb-90 md:pb-0">
                        <h2 class="text-30 fw-500 mt-4">{{ $product->name }}</h2>
                        <div class="text-24 fw-500 text-purple-1 mt-15">${{ $product->price }}</div>



                        <div class="shopSingle-info__action row x-gap-20 y-gap-20 pt-30">

                            <div class="col-auto">
                                <a href="{{route('checkout.store', ['item' => $product->id, 'type' => '2'])}}"
                                  class="button h-50 px-45 -purple-1 text-white">Buy Now</a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mt-30">
                        {!!$product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection