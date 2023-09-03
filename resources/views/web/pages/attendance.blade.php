@extends('web.app.app')

@section('main-body')
<div class="main-body">
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">
                            <h1 class="page-header__title">Attendance</h1>
                        </div>
                        <div data-anim="slide-up delay-2" class="is-in-view">
                            <p class="page-header__text">Mark attendance for participants.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50">
                <div class="col-lg-12">
                    <div class="attendance-form">
                        <form action="{{ route('attendance.store') }}" method="POST" class="contact-form">
                            @csrf

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Appointment</label>
                                <select name="appointment_id" class="selectize wide js-selectize" required>
                                    <option value="">Select a appointment</option>
                                    @foreach ($appointments as $appointment)
                                    <option value="{{ $appointment->id }}">{{ $appointment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Timeline</label>
                                <select name="duration" class="selectize wide js-selectize" required>
                                    @foreach ($durations as $duration)
                                    <option value="{{ $duration->id }}">{{ $duration->timeline }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class=" mt-3 button -md -purple-1 text-white">Mark
                                    Attendance</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection