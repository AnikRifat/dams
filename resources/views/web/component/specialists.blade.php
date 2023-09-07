<section class="layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
            <div class="col-lg-6">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title "> Specialists</h2>


                </div>

            </div>

            <div class="col-auto">

                <a href="{{ route('specialist.all') }}" class="button -icon -purple-3 text-purple-1">
                    All Specialists
                    <i class="icon-arrow-top-right text-13 ml-10"></i>
                </a>

            </div>
        </div>

        <div class="pt-60 lg:pt-40">
            <div class="overflow-hidden js-section-slider" data-loop data-gap="30" data-pagination
              data-slider-cols="xl-6 lg-6 md-4 sm-3 base-2">
                <div class="swiper-wrapper">

                    @foreach ($specialists as $item)
                    <div class="swiper-slide">
                        <div class="bg-dark-2 text-center my-5">
                            <a href="{{ route('specialist.details',$item->id) }}">
                                <img class="w-1/1" src="{{ asset('uploads/specialists/' . $item->image) }}" alt="book">
                                <h5 class="text-white fw-500 py-5 text-11 ">{{ $item->title }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>


                <div class="d-flex x-gap-15 items-center justify-center pt-60 lg:pt-40">
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                            <i class="icon icon-arrow-left"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <div class="pagination -arrows js-pagination"></div>
                    </div>
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-right-hover js-next">
                            <i class="icon icon-arrow-right"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>