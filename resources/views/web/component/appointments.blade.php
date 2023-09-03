<div class="row y-gap-30 justify-center">
    @foreach ($appointments as $item)
    <div class="col-lg-3 col-md-6">
        <div data-anim-child="slide-up delay-1">

            <a href="{{ route('appointment.details',$item->id) }}" class="appointmentsCard -type-1 ">
                <div class="relative">
                    <div class="appointmentsCard__image overflow-hidden rounded-8">
                        <img class="w-1/1" src="{{ asset('') }}uploads/appointments/{{ $item->image }}" alt="image">
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
                                <img src="{{ asset('') }}assets/web/img/appointmentsCards/icons/1.svg" alt="icon">
                            </div>
                        </div>

                        <div class="d-flex items-center">
                            <div class="mr-8">
                                <img src="{{ asset('') }}assets/web/img/appointmentsCards/icons/2.svg" alt="icon">
                            </div>
                            <div class="text-14 lh-1">{{ $item->durationName->timeline }}</div>
                        </div>



                    </div>

                    <div class="appointmentsCard-footer">
                        <div class="appointmentsCard-footer__author">
                            <img src="{{ asset('') }}uploads/doctors/{{ $item->creator->doctor->image }}" alt="image">
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