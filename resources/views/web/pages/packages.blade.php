@extends('web.app.app')


@section('main-body')
    <div class="main-body">
        <!-- blog breadcrumb version one strat here -->
        <section class="breadcrumb-blog-version-one">
            <div class="single-bredcurms" style="background-image:url('{{ asset('uploads/services/' . $service->image) }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bredcrums-content">
                                <h2> {{ $service->title }}</h2>
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="active"><a href="single-package.html">Package Details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- blog breadcrumb version one end here -->

        <section class="popular-packages pb-70 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-title text-center">
                            <h2>Our Leatest {{ $service->title }} packges</h2>
                            <p>{{ $service->description }} </p>
                            {{-- {{ dd($service->id->packages) }} --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($service->packages as $package)
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package">
                                <div class="package-image">
                                    <a href="#"><img src="{{ asset('uploads/packages/' . $package->image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="package-content">
                                    <h3>{{ $package->title }}</h3>
                                    <p>{{ $package->subtitle }} <span>${{ $package->price }}</span>
                                    </p>
                                </div>
                                <div class="packageButton">
                                    <div class="row text-center ">
                                        <div class="col-sm-6">
                                            <a href="{{ route('package.details', $package->title) }}"
                                                class="travel-booking-btn hvr-shutter-out-horizontal">Details</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="travel-querry-btn hvr-shutter-out-horizontal"
                                                data-toggle="modal" data-target="#exampleModal{{ $package->id }}">Ask
                                                Querry</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $package->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <aside>
                                            <div class="booking-form">
                                                <div class="booking-title">
                                                    <h2>Ask About {{ $package->title }} </h2>
                                                </div>
                                                <form action="{{ route('package-query.store') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" placeholder="Name *">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            id="confirm_email" placeholder="Confirm E-mail *">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" name="phone"
                                                            id="phone" placeholder="Phone Number *">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="messege" id="messege" cols="30" rows="10" class="form-control" placeholder="Message *"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="booking-confirm hvr-shutter-out-horizontal">Submit
                                                            Querry</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>


    </div>
@endsection
