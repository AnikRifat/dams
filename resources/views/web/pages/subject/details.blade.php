@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{{ $speacialistitem->title }} appointments</h2>


                    </div>

                </div>
            </div>
            @if($appointments->count() > 0)
            @include('web.component.appointments')
            @else
            <h2 class="text-center">No Appointments Availble</h2>
            @endif


        </div>
</div>
</section>

</div>

@endsection