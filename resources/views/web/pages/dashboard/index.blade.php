@extends('web.app.app')

@section('main-body')
<div class="main-body">
    <div class="dashboard-user">
        <div class="dashboard__content bg-blue-4">
            <div class="row pb-50 mb-10">
                <div class="col-auto">
                    <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white is-in-view">
                        Dashboard
                    </h1>

                </div>
                <div class="masthead">
                    <div class="masthead__content">
                        <h1 class="text-30 lh-12 fw-700"> Find a perfect Online Appointment</h1>

                        @if(Auth::user() && (Auth::user()->role == 1))

                        <div data-anim-child="slide-up delay-5" class="is-in-view">
                            <div class="masthead-form bg-white rounded-16 mt-30 px-10 py-10">
                                <form action="{{ route('filter') }}" method="POST"
                                  class=" d-flex x-gap-30 y-gap-10 items-center flex-wrap">
                                    @csrf

                                    <div class="masthead-form__item">
                                        <select class="form-control" name="speacialist_id">
                                            <option value="">---select---</option>
                                            @foreach($speacialists as $speacialist)
                                            <option value="{{ $speacialist->id }}">
                                                {{ $speacialist->title }}
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
                                          class="button -icon -purple-3 text-purple-1">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endif


                    </div>
                </div>

            </div>
            <div class="row y-gap-30">
                <div class="col-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="tabs -active-purple-2 js-tabs pt-0 ">
                            <div
                              class="tabs__controls d-flex x-gap-30 items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                                <button class="tabs__button text-light-1 js-tabs-button is-active"
                                  data-tab-target=".-tab-item-1" type="button">
                                    User Information
                                </button>
                                <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-b"
                                  type="button">
                                    Basic Information
                                </button>
                                {{-- <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-2"
                                  type="button">
                                    Password
                                </button>
                                <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-3"
                                  type="button">
                                    Social Profiles
                                </button> --}}
                            </div>
                            <div class="tabs__content py-30 px-30 js-tabs-content">
                                <div class="tabs__pane -tab-item-1 is-active">
                                    <div class="border-top-light pt-30 mt-30">
                                        <form action="{{ route('user.update', Auth::user()->id) }}"
                                          class="contact-form row y-gap-30" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name</label>
                                                <input type="text" placeholder="Name" name="name"
                                                  value="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone</label>
                                                <input type="tel" placeholder="Phone" name="phone"
                                                  value="{{ $user->phone }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email</label>
                                                <input type="text" placeholder="Email" name="email"
                                                  value="{{ $user->email }}">
                                            </div>
                                            <div class="col-12">
                                                <button class="button -md -purple-1 text-white">Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tabs__pane -tab-item-b">
                                    <div class="border-top-light pt-30 mt-30">
                                        @if (Auth::user()->role == 1)
                                        <form action="{{ route('patient.update', $user->patient->id) }}"
                                          class="contact-form row y-gap-30" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <input type="file" class="form-control dropify" id="image" name="image"
                                                  data-default-file="{{ asset('uploads/patients/'.$user->patient->image) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control dropify" id="file" name="file"
                                                  data-default-file="{{ asset('uploads/patients/'.$user->patient->file) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address</label>
                                                <input type="text" placeholder="address" name="address"
                                                  value="{{ $user->patient->address }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">School Name</label>
                                                <input type="text" placeholder="School" name="current_school"
                                                  value="{{ $user->patient->current_school }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Birthday</label>

                                                <input type="text" placeholder="Birthday" name="birthday"
                                                  value="{{ $user->patient->birthday }}">

                                            </div>
                                            <div class="col-12">
                                                <button class="button -md -purple-1 text-white">Update Profile</button>
                                            </div>
                                        </form>
                                        @elseif (Auth::user()->role == 2)
                                        <form action="{{ route('doctor.update', $user->doctor->id) }}"
                                          class="contact-form row y-gap-30" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <input type="file" class="form-control dropify" id="image" name="image"
                                                  data-default-file="{{ asset('uploads/doctors/'.$user->doctor->image) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control dropify" id="file" name="file"
                                                  data-default-file="{{ asset('uploads/doctors/'.$user->doctor->file) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Birthday</label>

                                                <input type="date" placeholder="Birthday" name="birthday"
                                                  value="{{ $user->doctor->birthday }}">

                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address</label>

                                                <input type="text" placeholder="Address" name="address"
                                                  value="{{ $user->doctor->address }}">

                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current
                                                    Profession</label>
                                                <select name="profession">
                                                    <option @if ($user->doctor->profession == "Part Time")
                                                        selected
                                                        @endif
                                                        value="Part Time">Part Time</option>
                                                    <option @if ($user->doctor->profession == "Full Time")
                                                        selected
                                                        @endif
                                                        value="Full Time">Full Time</option>
                                                    <option @if ($user->doctor->profession == "Unemployed")
                                                        selected
                                                        @endif
                                                        value="Unemployed">Unemployed</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Speacialist You
                                                    Want to
                                                    Teach</label>
                                                <select name="speacialist">
                                                    @foreach ($speacialists as $speacialist)
                                                    <option value="{{ $speacialist->id }}" @if ($user->
                                                        doctor->speacialist ==
                                                        $speacialist->id) selected @endif>{{ $speacialist->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <button class="button -md -purple-1 text-white">Update Profile</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tabs__pane -tab-item-2">
                                <form action="#" class="contact-form row y-gap-30">
                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current Password</label>
                                        <input type="text" placeholder="Current password">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">New Password</label>
                                        <input type="text" placeholder="New password">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Confirm New
                                            Password</label>
                                        <input type="text" placeholder="Confirm New Password">
                                    </div>
                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white">Save Password</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tabs__pane -tab-item-3">
                                <form action="#" class="contact-form row y-gap-30">
                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Twitter</label>
                                        <input type="text" placeholder="Twitter Profile">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Facebook</label>
                                        <input type="text" placeholder="Facebook Profile">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Instagram</label>
                                        <input type="text" placeholder="Instagram Profile">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">LinkedIn Profile
                                            URL</label>
                                        <input type="text" placeholder="LinkedIn Profile">
                                    </div>
                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white">Save Social Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection