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
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">
                        <div
                          class="tabs__controls d-flex items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                            <button class="text-light-1 lh-12 tabs__button js-tabs-button is-active"
                              data-tab-target=".-tab-item-1" type="button">
                                All Appointments
                            </button>
                            <button class="text-light-1 lh-12 tabs__button js-tabs-button ml-30"
                              data-tab-target=".-tab-item-2" type="button">
                                Active
                            </button>
                            <button class="text-light-1 lh-12 tabs__button js-tabs-button ml-30"
                              data-tab-target=".-tab-item-3" type="button">
                                Pending
                            </button>
                            <button class="text-light-1 lh-12 tabs__button js-tabs-button ml-30"
                              data-tab-target=".-tab-item-4" type="button">
                                Archived
                            </button>
                        </div>

                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">

                                <div class="row y-gap-30 pt-30">

                                    @foreach($appointments as $appointment)
                                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                        <div class="relative">
                                            <img class="rounded-8 w-1/1"
                                              src="{{ asset('/uploads/appointments/' . $appointment->image) }}"
                                              alt="{{ $appointment->title }}">

                                            <button class="absolute-button"
                                              data-el-toggle=".js-more-{{ $appointment->id }}-toggle">
                                                <span
                                                  class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                                    <i class="icon-menu-vertical"></i>
                                                </span>
                                            </button>

                                            <div
                                              class="toggle-element -dshb-more js-more-{{ $appointment->id }}-toggle">

                                                <div
                                                  class="px-25 py-25 bg-white -dark-bg-dark-2 shadow-1 border-light rounded-8">
                                                    <a href="{{ route('appointments.archive',$appointment->id) }}"
                                                      class="d-flex items-center mt-20">
                                                        <div class="icon-bookmark"></div>
                                                        <div class="text-17 lh-1 fw-500 ml-12">Archive</div>
                                                    </a>
                                                    <a href="{{ route('appointments.edit',$appointment->id) }}"
                                                      class="d-flex items-center mt-20">
                                                        <div class="icon-bookmark"></div>
                                                        <div class="text-17 lh-1 fw-500 ml-12">Edit</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                <div>
                                                    @if($appointment->status == 2)
                                                    <div class="px-15 rounded-200 bg-purple-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Pending</span>
                                                    </div>
                                                    @elseif ($appointment->status == 1)
                                                    <div class="px-15 rounded-200 bg-green-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Active</span>
                                                    </div>
                                                    @elseif ($appointment->status == 3)
                                                    <div class="px-15 rounded-200 bg-blue-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Archived</span>
                                                    </div>
                                                    @else
                                                    <div class="px-15 rounded-200 bg-red-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Inactive</span>
                                                    </div>
                                                    @endif

                                                </div>


                                            </div>
                                        </div>

                                        <div class="pt-15">
                                            <div class="d-flex y-gap-10 justify-between items-center">
                                                <div class="text-14 lh-1">{{ $appointment->creator->name }}</div>

                                                <div class="d-flex items-center">
                                                    <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                        {{ $appointment->rating }}
                                                    </div>

                                                </div>
                                            </div>

                                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $appointment->title }}</h3>
                                        </div>
                                    </div>
                                    @endforeach



                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2">

                                <div class="row y-gap-30 pt-30">

                                    @foreach($appointments->where('status',1) as $appointment)
                                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                        <div class="relative">
                                            <img class="rounded-8 w-1/1"
                                              src="{{ asset('/uploads/appointments/' . $appointment->image) }}"
                                              alt="{{ $appointment->title }}">
                                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                <div>
                                                    @if($appointment->status == 2)
                                                    <div class="px-15 rounded-200 bg-purple-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Pending</span>
                                                    </div>
                                                    @elseif ($appointment->status == 1)
                                                    <div class="px-15 rounded-200 bg-green-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Active</span>
                                                    </div>
                                                    @elseif ($appointment->status == 3)
                                                    <div class="px-15 rounded-200 bg-blue-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Archived</span>
                                                    </div>
                                                    @else
                                                    <div class="px-15 rounded-200 bg-red-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Inactive</span>
                                                    </div>
                                                    @endif

                                                </div>


                                            </div>
                                            <button class="absolute-button"
                                              data-el-toggle=".js-more-active-{{ $appointment->id }}-toggle">
                                                <span
                                                  class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                                    <i class="icon-menu-vertical"></i>
                                                </span>
                                            </button>

                                            <div
                                              class="toggle-element -dshb-more js-more-active-{{ $appointment->id }}-toggle">
                                                <div
                                                  class="px-25 py-25 bg-white -dark-bg-dark-2 shadow-1 border-light rounded-8">
                                                    <a href="{{ route('appointments.edit',$appointment->id) }}"
                                                      class="d-flex items-center mt-20">
                                                        <div class="icon-bookmark"></div>
                                                        <div class="text-17 lh-1 fw-500 ml-12">Edit</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-15">
                                            <div class="d-flex y-gap-10 justify-between items-center">
                                                <div class="text-14 lh-1">{{ $appointment->creator->name }}</div>

                                                <div class="d-flex items-center">
                                                    <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                        {{ $appointment->rating }}
                                                    </div>

                                                </div>
                                            </div>

                                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $appointment->title }}</h3>
                                        </div>
                                    </div>
                                    @endforeach



                                </div>
                            </div>
                            <div class="tabs__pane -tab-item-3">

                                <div class="row y-gap-30 pt-30">

                                    @foreach($appointments->where('status',2) as $appointment)
                                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                        <div class="relative">
                                            <img class="rounded-8 w-1/1"
                                              src="{{ asset('/uploads/appointments/' . $appointment->image) }}"
                                              alt="{{ $appointment->title }}">

                                            <button class="absolute-button"
                                              data-el-toggle=".js-more-pending-{{ $appointment->id }}-toggle">
                                                <span
                                                  class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                                    <i class="icon-menu-vertical"></i>
                                                </span>
                                            </button>

                                            <div
                                              class="toggle-element -dshb-more js-more-pending-{{ $appointment->id }}-toggle">
                                                <div
                                                  class="px-25 py-25 bg-white -dark-bg-dark-2 shadow-1 border-light rounded-8">
                                                    <a href="{{ route('appointments.edit',$appointment->id) }}"
                                                      class="d-flex items-center mt-20">
                                                        <div class="icon-bookmark"></div>
                                                        <div class="text-17 lh-1 fw-500 ml-12">Edit</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-15">
                                            <div class="d-flex y-gap-10 justify-between items-center">
                                                <div class="text-14 lh-1">{{ $appointment->creator->name }}</div>

                                                <div class="d-flex items-center">
                                                    <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                        {{ $appointment->rating }}
                                                    </div>

                                                </div>
                                            </div>

                                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $appointment->title }}</h3>
                                        </div>
                                    </div>
                                    @endforeach



                                </div>
                            </div>
                            <div class="tabs__pane -tab-item-4">

                                <div class="row y-gap-30 pt-30">

                                    @foreach($appointments->where('status',3) as $appointment)
                                    <div class="w-1/5 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                        <div class="relative">
                                            <img class="rounded-8 w-1/1"
                                              src="{{ asset('/uploads/appointments/' . $appointment->image) }}"
                                              alt="{{ $appointment->title }}">
                                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                <div>
                                                    @if($appointment->status == 2)
                                                    <div class="px-15 rounded-200 bg-purple-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Pending</span>
                                                    </div>
                                                    @elseif ($appointment->status == 1)
                                                    <div class="px-15 rounded-200 bg-green-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Active</span>
                                                    </div>
                                                    @elseif ($appointment->status == 3)
                                                    <div class="px-15 rounded-200 bg-blue-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Archived</span>
                                                    </div>
                                                    @else
                                                    <div class="px-15 rounded-200 bg-red-1">
                                                        <span
                                                          class="text-11 lh-1 uppercase fw-500 text-white">Inactive</span>
                                                    </div>
                                                    @endif

                                                </div>


                                            </div>
                                            <button class="absolute-button"
                                              data-el-toggle=".js-more-pending-{{ $appointment->id }}-toggle">
                                                <span
                                                  class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                                    <i class="icon-menu-vertical"></i>
                                                </span>
                                            </button>

                                            <div
                                              class="toggle-element -dshb-more js-more-pending-{{ $appointment->id }}-toggle">
                                                <div
                                                  class="px-25 py-25 bg-white -dark-bg-dark-2 shadow-1 border-light rounded-8">
                                                    <a href="{{ route('appointments.edit',$appointment->id) }}"
                                                      class="d-flex items-center mt-20">
                                                        <div class="icon-bookmark"></div>
                                                        <div class="text-17 lh-1 fw-500 ml-12">Edit</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-15">
                                            <div class="d-flex y-gap-10 justify-between items-center">
                                                <div class="text-14 lh-1">{{ $appointment->creator->name }}</div>

                                                <div class="d-flex items-center">
                                                    <div class="text-14 lh-1 text-yellow-1 mr-10">
                                                        {{ $appointment->rating }}
                                                    </div>

                                                </div>
                                            </div>

                                            <h3 class="text-16 fw-500 lh-15 mt-10">{{ $appointment->title }}</h3>
                                        </div>
                                    </div>
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer -dashboard py-30">
        <div class="row items-center justify-between">
            <div class="col-auto">
                <div class="text-13 lh-1">© 2022 Educrat. All Right Reserved.</div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center flex-wrap x-gap-20">
                        <div>
                            <a href="help-center.html" class="text-13 lh-1">Help</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Cookie Notice</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Security</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Terms of Use</a>
                        </div>
                    </div>

                    <button class="button -md -rounded bg-light-4 text-light-1 ml-30">English</button>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection