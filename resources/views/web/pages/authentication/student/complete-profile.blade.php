@extends('web.app.app')

@section('main-body')
<div class="main-body">

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50">




                <div class="col-lg-12">
                    <div class="dashboard__content bg-light-4">
                        <div class="row pb-50 mb-10">
                            <div class="col-12 text-center">

                                <h1 class="text-30 lh-12 fw-700">Complete Profile</h1>
                                {{-- <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div> --}}

                            </div>
                        </div>


                        <div class="tabs__pane -tab-item-1 is-active">

                            <div class="border-top-light pt-30 mt-30">
                                @if (Auth::user()->role == 1)
                                <form action="{{ route('patient.store') }}" method="POST"
                                  class="contact-form row y-gap-30" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="row y-gap-20 x-gap-20 items-center">
                                            <div class="col-auto">

                                                <input type="file" class="form-control dropify" id="image" name="image"
                                                  data-default-file="{{ old('image') }}" required>
                                            </div>

                                            <div class="col-auto">
                                                <label for="image" class="form-label">Upload Your Profile
                                                    Picture</label>
                                                <div class="text-14 lh-1 mt-10">PNG or JPG no bigger than 800px
                                                    wide and tall.</div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row y-gap-20 x-gap-20 items-center">
                                            <div class="col-auto">

                                                <input type="file" class="form-control dropify" id="file" name="file"
                                                  data-default-file="{{ old('file') }}" required>
                                            </div>

                                            <div class="col-auto">
                                                <label for="file" class="form-label">Upload Your Document( related with
                                                    patient identification)</label>
                                                <div class="text-14 lh-1 mt-10">only PDF/JPG/JPEG are allowed</div>


                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Birthday</label>

                                        <input type="date" name="birthday" class="form-control" max="2015-12-31"
                                          placeholder="Birthday" required>
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address
                                            Line </label>

                                        <input type="text" name="address" placeholder="Address Line 1" required>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current Group
                                            (Science/Arts/Commerce)</label>
                                        <select name="current_department" class="form-control">
                                            <option value="science">Science</option>
                                            <option value="arts">Arts</option>
                                            <option value="commerce">Commerce</option>
                                        </select>
                                    </div>



                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current School</label>

                                        <input type="text" name="current_school" placeholder="School" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current Class</label>
                                        <select name="current_class" class="form-control">
                                            @foreach ($categories as $category)

                                            <option value="{{ $category->title }}">{{ $category->title }}</option>
                                            @endforeach

                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="button -md -purple-1 text-white">Update
                                            Profile</button>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('doctor.store') }}" method="POST"
                                  class="contact-form row y-gap-30" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="row y-gap-20 x-gap-20 items-center">
                                            <div class="col-auto">

                                                <input type="file" class="form-control dropify" id="image" name="image"
                                                  data-default-file="{{ old('image') }}" required>
                                            </div>

                                            <div class="col-auto">
                                                <label for="image" class="form-label">Upload Your P{icture}</label>
                                                <div class="text-14 lh-1 mt-10">PNG or JPG no bigger than 800px
                                                    wide and tall.</div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row y-gap-20 x-gap-20 items-center">
                                            <div class="col-auto">

                                                <input type="file" class="form-control dropify" id="file" name="file"
                                                  data-default-file="{{ old('file') }}" required>
                                            </div>

                                            <div class="col-auto">
                                                <label for="file" class="form-label">Upload Your Document (related with
                                                    your Education Inetifiaction)</label>
                                                <div class="text-14 lh-1 mt-10">only PDF/JPG/JPEG are allowed</div>


                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Birthday</label>

                                        <input type="date" name="birthday" class="form-control" placeholder="Birthday"
                                          max="2015-12-31" required>
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Address
                                            Line </label>

                                        <input type="text" name="address" placeholder="Address Line 1" required>
                                    </div>


                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Curent profession</label>

                                        <select name="profession">
                                            <option value="1">Part Time</option>
                                            <option value="2">Full Time</option>
                                            <option value="3">Unemployed</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">

                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Speacialist You want to
                                            Teach</label>

                                        <select name="speacialist">
                                            @foreach ($speacialists as $speacialist)
                                            <option value="{{$speacialist->id}}">{{$speacialist->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="button -md -purple-1 text-white">Update
                                            Profile</button>
                                    </div>
                                </form>
                                @endif

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection