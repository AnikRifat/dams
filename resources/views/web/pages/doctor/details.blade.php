@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="page-header -type-3">
        <div class="page-header__bg bg-purple-1"></div>
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="page-header__content">
                        <div class="page-header__img">
                            <img src="{{ asset('uploads/doctors') }}/{{ $doctor->doctor->image }}" alt="image">
                        </div>

                        <div class="page-header__info pt-20">
                            <h1 class="text-30 lh-14 fw-700 text-white">{{ $doctor->name }}</h1>
                            <div class="text-white">{{ $doctor->doctor->speacialists->title }}</div>
                            <div class="d-flex x-gap-20 pt-15">

                                <div class="d-flex items-center text-white">
                                    <div class="icon-play mr-10"></div>
                                    <div class="text-13 lh-1">{{ $doctor->doctor->appointments->count() }} Appointment
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- @if($isPurchased)
                        <div class="d-flex items-center mt-30">
                            <a href="{{ route('chat.show.patient',$doctor->id) }}"
                              class="button -md -green-1 text-dark-1">Send Message</a>
                        </div>
                        @endif -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap="" class="container animated">

            <div class="row y-gap-30 justify-center">
                @foreach ($doctor->doctor->appointments as $item)
                <div class="col-lg-3 col-md-6">
                    <div data-anim-child="slide-up delay-1">

                        <a href="{{ route('appointment.details',$item->id) }}" class="appointmentsCard -type-1 ">
                            <div class="relative">
                                <div class="appointmentsCard__image overflow-hidden rounded-8">
                                    <img class="w-1/1" src="{{ asset('') }}uploads/appointments/{{ $item->image }}"
                                      alt="image">
                                    <div class="appointmentsCard__image_overlay rounded-8"></div>
                                </div>
                                <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                </div>
                            </div>

                            <div class="h-100 pt-15">


                                <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $item->title }}</div>

                                <div class="d-flex x-gap-10 items-center pt-10">



                                    <div class="d-flex items-center">
                                        <div class="mr-8">
                                            <img src="{{ asset('') }}assets/web/img/appointmentsCards/icons/2.svg"
                                              alt="icon">
                                        </div>
                                        <div class="text-14 lh-1">{{ $item->durationName->timeline }}</div>
                                    </div>

                                    <div class="d-flex items-center">
                                        <div class="mr-8">
                                            <img src="{{ asset('') }}assets/web/img/appointmentsCards/icons/3.svg"
                                              alt="icon">
                                        </div>
                                        <div class="text-14 lh-1">Beginner</div>
                                    </div>

                                </div>

                                <div class="appointmentsCard-footer">
                                    <div class="appointmentsCard-footer__author">
                                        <img src="{{ asset('') }}uploads/doctors/{{ $item->creator->doctor->image }}"
                                          alt="image">
                                        <div>{{ $item->creator->name }}</div>
                                    </div>

                                    <div class="appointmentsCard-footer__price">

                                        <div>${{ $item->price }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach


            </div>
    </section>
</div>

@endsection