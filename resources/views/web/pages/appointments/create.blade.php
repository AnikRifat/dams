@extends('web.app.app')

@push('style')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@section('main-body')
<div class="main-body">
    <div class="dashboard-user">
        <div class="dashboard__content bg-light-4">
            <div class="row pb-50 mb-10">
                <div class="col-auto">

                    <h1 class="text-30 lh-12 fw-700">Create New Appointment</h1>

                </div>
            </div>


            <div class="row y-gap-60">
                <div class="col-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
                        </div>

                        <div class="py-30 px-30">
                            <form class="contact-form row y-gap-30" action="{{ route('appointments.store') }}"
                              method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Appointment Title*</label>
                                    <input type="text" name="title"
                                      placeholder="Learn Figma - UI/UX Design Essential Training">
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Appointment price*</label>
                                    <input type="text" name="price" placeholder="99.00">
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Appointment
                                        Description*</label>
                                    <textarea name="description" id="summernote" placeholder="Description"
                                      rows="7"></textarea>
                                </div>

                                {{-- <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Class*</label>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach($categories as $class)
                                        <option value="{{ $class->id }}">{{ $class->title }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Speacialist*</label>
                                    <select name="speacialist_id" class="form-control">
                                        <option value="">Select Speacialist</option>
                                        @foreach($speacialists as $speacialist)
                                        <option value="{{ $speacialist->id }}">{{ $speacialist->title }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Duration*</label>
                                    <select name="duration" class="form-control">
                                        <option value="">Select duration</option>
                                        @foreach($durations as $duration)
                                        <option class="text-dark-1" value="{{ $duration->id }}">
                                            {{ $duration->timeline }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Class Link*</label>
                                    <input type="text" name="meeting_link" placeholder="Class Link">
                                </div> --}}
                                <input type="text" name="creator_id" value="{{Auth::user()->id}}" hidden>

                                <div class="col-md-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Image*</label>
                                    <input type="file" name="image" class="dropify">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button -md -outline-purple-1 text-purple-1">Create
                                        Appointment</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>


</div>

<script>
    $('#summernote').summernote({
      placeholder: 'Hello i am html ediotr',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
</script>
@endsection
