@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">Doctor List</h1>

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
        <div data-anim-wrap="" class="container animated">

            <div class="row y-gap-30">
                @foreach ($doctors as $doctor)
                <div class="col-lg-3 col-md-6">
                    <div data-anim-child="slide-left delay-2" class="teamCard -type-1 is-in-view">
                        <div class="teamCard__image"><a href="{{ route('doctor.details',$doctor->id) }}">
                                <img src="{{ asset('uploads/doctors') }}/{{ $doctor->doctor->image }}" alt="image">
                            </a>
                        </div>
                        <div class="teamCard__content">
                            <h4 class="teamCard__title">{{ $doctor->name }}</h4>
                            <p class="teamCard__text">{{ $doctor->doctor->speacialists->title }}</p>
                            <div class="d-flex x-gap-10 pt-10">
                                <div class="d-flex items-center">
                                    <div class="icon-play text-14"></div>
                                    <div class="text-13 lh-1 ml-8">{{ $doctor->doctor->appointments->count() }}
                                        Appointment
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>


        </div>
    </section>


</div>

@endsection