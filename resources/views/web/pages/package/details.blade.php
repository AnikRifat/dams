@extends('web.app.app')


@section('main-body')
<div class="main-body">
<!-- blog breadcrumb version one strat here -->
<section class="breadcrumb-blog-version-one">
	<div class="single-bredcurms" style="background-image:url('{{ asset('uploads/services/' . $package->service->image) }}');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="bredcrums-content">
						<h2>{{ $package->service->title }}</h2>
						<ul>
							<li><a href="{{ route('index') }}">Home</a>
							</li>
							<li class="active"><a href="single-package.html">{{ $package->title }}</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- blog breadcrumb version one end here -->

<section class="section-paddings single-package-area">
	<div class="container">
		<div class="row">
			<!-- single package tab with details -->
			<div class="col-md-8 col-sm-12">
				<div class="single-package-details">
					<div class="single-package-title">
						<h2>{{ $package->title }}</h2>
					</div>
					<ul class="package-content">
						<li>{{ $package->subtitle }}</li>

						<li>{{ $package->price }} ৳</li>
					</ul>
					<div class="package-features-image">
						<img src="{{ asset('uploads/packages/' . $package->image) }}" alt="" class="img-responsove border-raduis-3">
					</div>
				</div><!-- tab menu strat -->

				<div class="package-tab-menu">
					<ul class="package-tab-menu" role="tablist" id="tab7">
						<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
						</li>
						<li role="presentation"><a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Tour Itinerary</a>
						</li>
						<li role="presentation"><a href="#map" aria-controls="map" role="tab" data-toggle="tab">Benifits & Policy</a>
						</li>
						<li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Aditinal Information</a>
						</li>

					</ul>
				</div><!-- tab menu end -->

				<!-- tab content start -->
				<div class="row">
					<!-- tabs content -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="description">
							<div class="row">
								<!-- left content -->
								<div class="col-md-12 col-sm-12">
									<div class="tour-description">
										<h4>Tour Description</h4>
										<p>{!! $package->description !!}</p>
									</div>



								</div><!-- left-content -->

							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="itinerary">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="tour-description">
										<h4>Tour Itinerary</h4>
										<p>{!! $package->itinerary !!}</p>
									</div>
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="map">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="tour-description">
										<h4>Tour Benifits and Policy</h4>
										<p>{!! $package->notes_policy !!}</p>
									</div>
								</div>
							</div>
						</div>

						<!-- video tab content start -->
						<div role="tabpanel" class="tab-pane fade" id="video">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="tour-description">
										<h4>Aditinal Information</h4>
										<div class="row">
                                            <div class="col-md-12 ">
                                                <div class="tour-description">
                                                    <h4>Package Pricing</h4>
                                                    <p>{!! $package->packages_pricing !!}</p>
                                                </div>
                                            </div>
                                            <div class="tour-description">
                                                <h4>Tour Map</h4>
                                            <!-- map -->
                                            <div class="mapp" id="overlay">
                                                <iframe id="maping" src="{{ $package->tour_map }}" allowfullscreen></iframe>
                                            </div><!-- map -->
                                            </div>

                                        </div>
									</div>
								</div>
							</div>
						</div><!-- video tab content end -->

					</div><!-- tabs content-->
				</div><!-- tab content end -->
			</div><!-- single package tab with details -->

			<!-- booking form start here -->
			<div class="col-md-4 col-sm-12">
                <aside>
                    <div class="booking-form">
                        <div class="booking-title">
                            <h2>Ask About {{ $package->title }} </h2>
                        </div>
                        <form action="{{ route('package-query.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name *">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  name="email" id="confirm_email" placeholder="Confirm E-mail *">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control"  name="phone" id="phone" placeholder="Phone Number *">
                            </div>
                            <div class="form-group">
                                <textarea name="messege" id="messege" cols="30" rows="10" class="form-control" placeholder="Message *"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="booking-confirm hvr-shutter-out-horizontal">Submit Querry</button>
                            </div>
                        </form>
                    </div>
                </aside>

				<div class="adding-form">
					<div class="addfor-bg">
						<div class="add-content">
							<h3>Any Question?</h3>
							<p>Lorem ipsum dolor sit amet, consectet ur adipiscing elit, sedpr do eiusmod tempor incididunt ut.</p>
							<ul class="contact-for-add">
								<li><img src="images/icon/phone.png" alt="">+123-456-7890</li>
								<li><img src="images/icon/gmail.png" alt="">info@yourcompany.com</li>
							</ul>
						</div>
					</div>
				</div><!-- adverestment start here-->
			</div><!-- booking form end here -->
		</div>
	</div>
</section>

<!-- realted tour start here -->
{{-- <section class="related-tour popular-packages">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="section-title-3 mbt-100 related-title">
                <h2>Related Post</h2>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4 col-sm-4">
            <div class="single-package">
                <div class="package-image">
                    <a href="#"><img src="images/packages/1.jpg" alt="">
                    </a>
                </div>
                <div class="package-content">
                    <h3>Dubai – All Stunning Places</h3>
                    <p>4Days, 5 Nights Start From <span>$500</span>
                    </p>
                </div>
                <div class="package-calto-action">
                    <ul class="ct-action">
                        <li><a href="#" class="travel-booking-btn hvr-shutter-out-horizontal">Book Now</a>
                        </li>
                        <li>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section> --}}

@endsection
