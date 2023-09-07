<section class="layout-pt-lg layout-pb-lg">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
            <div class="col-lg-6">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Learn from the best instructors</h2>

                    <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                </div>

            </div>

            <div class="col-auto">

                <a href="{{ route('doctor.all') }}" class="button -icon -purple-3 text-purple-1">
                    View All Instructors
                    <i class="icon-arrow-top-right text-13 ml-10"></i>
                </a>

            </div>
        </div>
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
                        <p class="teamCard__text">{{ $doctor->doctor->specialists->title }}</p>
                        <div class="d-flex x-gap-10 pt-10">
                            <div class="d-flex items-center">
                                <div class="icon-play text-14"></div>
                                <div class="text-13 lh-1 ml-8">{{ $doctor->doctor->appointments->count() }} Appointment
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>

        <div class="row justify-center text-center pt-60 lg:pt-40">
            <div class="col-auto">
                <p class="lh-1">Want to help people learn, grow and achieve more in life? <a
                      class="text-purple-1 underline" href="instructors-become.html">Become an
                        instructor</a></p>
            </div>
        </div>
    </div>
</section>