@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <!-- blog breadcrumb version one strat here -->
    <section class="breadcrumb-blog-version-one">
        <div class="single-bredcurms" style="background:#f17b37;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bredcrums-content">
                            <h2>Package</h2>
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
    @foreach ($services as $service)
    @if ($service->packages->count() > 0)
    <section class="tour-package-bg image-bg-padding-100"
      style="background: transparent url({{ asset('uploads/services/' . $service->image) }}) repeat scroll 0 0;background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-white text-center">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ $service->subtitle }}</p>
                    </div>
                </div>
                <!-- tour packages carosual -->
                <div class="popular-packages-carasoul service-{{ $service->id }} owl-carousel">
                    @foreach ($service->packages as $package)
                    <div class="single-package-carasoul">
                        <div class="package-location">
                            <img src="{{ asset('uploads/packages/' . $package->image) }}" alt="">
                            <span>{{ $package->price }}৳</span>
                        </div>
                        <div class="package-details">
                            <div class="package-places">
                                <h4>{{ $package->title }}</h4>
                                <div class="details">
                                    <p>{{ substr($package->description, 0, 100) . '...' }}.</p>
                                </div>
                            </div>
                            <div class="package-ratings-review">
                                <ul class="two-column">
                                    <li>
                                        <div class="package-long-btn hvr-shutter-out-horizontal">
                                            <a href="{{ route('package.details', $package->title) }}">Book
                                                Now</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="package-long-btn" style="background: #f17b37">
                                            <a href="#" data-toggle="modal"
                                              data-target="#exampleModal{{ $package->id }}">Ask Querry</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>




            </div>
        </div>
    </section>
    @endif


    @foreach ($service->packages as $package)
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
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name *">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="confirm_email"
                                      placeholder="Confirm E-mail *">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                      placeholder="Phone Number *">
                                </div>
                                <div class="form-group">
                                    <textarea name="messgae" name="message" id="message" cols="30" rows="10"
                                      class="form-control" placeholder="Message *"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="booking-confirm hvr-shutter-out-horizontal">Submit
                                        Querry</button>
                                </div>
                            </form>
                        </div>
                    </aside ide>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
    @section('script')
    @foreach ($services as $service)
    <script>
        $(document).ready(function() {

                $('.popular-packages-carasoul.service-{{ $service->id }}').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    autoplay:true,
                    autoplayTimeout:2000,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                })


            });
    </script>
    @endforeach
    @endsection


</div>

@endsection