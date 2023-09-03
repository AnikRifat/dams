@extends('web.app.app')


@section('main-body')

<section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Our Most Popular Appointments</h2>

                    <p class="sectionTitle__text ">10,000+ unique online appointment list designs</p>

                </div>

            </div>
        </div>
        @include('web.component.appointments')

    </div>
    </div>
</section>



@endsection