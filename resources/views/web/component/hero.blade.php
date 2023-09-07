<section data-anim-wrap="" class="masthead -type-7 js-mouse-move-container animated">
    <div class="masthead__bg bg-purple-1 rounded-16">
        <img src="{{ asset('') }}assets/web/img/home-9/hero/bg.png" alt="image">
    </div>

    <div class="container">
        <div class="row y-gap-20 justify-between items-center">
            <div class="col-xl-7 col-lg-6">
                <div class="masthead__content">
                    <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white is-in-view">
                        Find a perfect Online Appointment
                    </h1>
                    <p data-anim-child="slide-up delay-4"
                      class="masthead__text text-16 lh-2 text-white pt-10 is-in-view">
                        You can access 7900+ different appointments from 600<br class="lg:d-none"> professional trainers
                        for
                        free
                    </p>
                    @if(Auth::user())
                    @if(Auth::user()->role == '1' && Auth::user()->allow == '1' )

                    <div data-anim-child="slide-up delay-5" class="is-in-view">
                        <div class="masthead-form bg-white rounded-16 mt-30 px-10 py-10">
                            <form action="{{ route('filter') }}" method="POST"
                              class=" d-flex x-gap-30 y-gap-10 items-center flex-wrap">
                                @csrf

                                <div class="masthead-form__item">
                                    <select class="form-control" name="specialist_id">
                                        <option value="">---select---</option>
                                        @foreach($specialists as $specialist)
                                        <option value="{{ $specialist->id }}">
                                            {{ $specialist->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="masthead-form__item">
                                    <select class="form-control" name="duration">
                                        <option value="">---select---</option>

                                        @foreach($durations as $duration)
                                        <option value="{{ $duration->id }}">
                                            {{ $duration->timeline }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="masthead-form__button">
                                    <button type="submit"
                                      class="button -dark-1 text-white -dark-button-dark-1">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endif


                </div>
            </div>

            <div class="col-xl-5 col-lg-6">
                <div class="masthead-image">
                    <div class="masthead-image__img1">
                        <img data-move="20" class="js-mouse-move" src="{{ asset('') }}assets/web/img/home-9/hero/1.png"
                          alt="image" style="transform: translate(-4.9369px, 19.698px);">
                    </div>

                    <div class="-el-1"><img class="js-mouse-move" data-move="40"
                          src="{{ asset('') }}assets/web/img/home-9/hero/2.png" alt="icon"
                          style="transform: translate(-9.8738px, 39.3961px);"></div>
                    <div class="-el-2"><img class="js-mouse-move" data-move="40"
                          src="{{ asset('') }}assets/web/img/home-9/hero/3.png" alt="icon"
                          style="transform: translate(-9.8738px, 39.3961px);"></div>
                    <div class="-el-3"><img class="js-mouse-move" data-move="40"
                          src="{{ asset('') }}assets/web/img/home-9/hero/4.png" alt="icon"
                          style="transform: translate(-9.8738px, 39.3961px);"></div>
                </div>
            </div>
        </div>
    </div>
</section>