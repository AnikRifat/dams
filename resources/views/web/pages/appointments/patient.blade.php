@extends('web.app.app')


@section('main-body')
<div class="dashboard-main">
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">My Appointments</h1>
                <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="row y-gap-10 justify-between">
                    <div class="col-auto">
                        <form class="search-field border-light rounded-8 h-50" action="post">
                            <input class="bg-white -dark-bg-dark-2 pr-50" type="text" placeholder="Search Appointments">
                            <button class="" type="submit">
                                <i class="icon-search text-light-1 text-20"></i>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="row y-gap-30 pt-30">

                    @foreach($orders as $item)
                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                        <div class="relative">
                            <img class="rounded-8 w-1/1 "
                              src="{{ asset('/uploads/appointments/' . $item->appointment->image) }}"
                              alt="{{ $item->appointment->title }}">





                        </div>

                        <div class="pt-15">
                            <div class="d-flex y-gap-10 justify-between items-center">
                                <div class="text-14 lh-1">{{ $item->appointment->creator->name }}</div>

                                @if($item->status == 2)
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-red-1 mr-10">pending
                                    </div>

                                </div>
                                @else
                                <div class="d-flex items-center">
                                    <div class="text-14 lh-1 text-green-1 mr-10">Active
                                    </div>
                                </div>
                                @endif

                            </div>

                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $item->appointment->title }}</h3>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>

    </div>


</div>

@endsection