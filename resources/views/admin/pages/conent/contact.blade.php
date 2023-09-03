@extends('admin.app.app')
@section('main-content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">General Content</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">content</a></li>
                                <li class="breadcrumb-item active">General Content</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('general.update', $content->id) }}"
                              enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="website_email" class="form-label">Website Email</label>
                                        <input type="email" class="form-control" id="website_email" name="website_email"
                                          value="{{ $content->website_email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="website_phone" class="form-label">Website Phone</label>
                                        <input type="tel" class="form-control" id="website_phone" name="website_phone"
                                          value="{{ $content->website_phone }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="website_address" class="form-label">Website name</label>
                                        <textarea type="address" class="form-control" id="website_address"
                                          name="website_address" required>{{ $content->website_address }}</textarea>
                                    </div>


                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->


    {{-- </div> --}}
    @endsection