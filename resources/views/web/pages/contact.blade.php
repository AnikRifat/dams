@extends('web.app.app')


@section('main-body')
<div class="main-body">
	<!-- blog breadcrumb version one strat here -->
	<section class="breadcrumb-blog-version-one">
		<div class="single-bredcurms" style="background-image:url('images/bercums/contact-page.jpg');">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="bredcrums-content">
							<h2>Contact US</h2>
							<ul>
								<li><a href="{{ route('index') }}">Home</a></li>
								<li class="active"><a href="blog-single.html">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- blog breadcrumb version one end here -->

	<!-- google map start  -->
	<div class="map-wrapper">
		<div class="map-area">
			<iframe
			  src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3649.9477014223007!2d90.35606461538558!3d23.820458692012327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sbd!4v1681036451792!5m2!1sen!2sbd"
			  height="600" style="border:0; width:100%" allowfullscreen="" loading="lazy"
			  referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>

	<!-- google map end  -->
	<section class="section-paddings">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="contact-title">
						<h2>Our Office</h2>
					</div>
					<div class="address">
						<p>
							<strong>Address</strong>
							<br> {{ $content->website_address }}
						</p>

						<p>
							<strong>Email</strong>
							<br> {{ $content->website_email }}
						</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="contact-title">
						<h2>Contact</h2>
					</div>
					<div class="contact-form">
						<div id="contact">
							<div id="message"></div>
							<!-- Contact Form -->
							<form class="form" method="post" action="#" name="contactform" id="contactform">
								<div class="form-group">
									<input type="text" placeholder="Name" required="required" name="name" id="name">
								</div>
								<div class="form-group">
									<input type="email" placeholder="Email" required="required" name="email" id="email">
								</div>
								<div class="form-group">
									<input type="text" placeholder="Speacialist" required="required" name="speacialist"
									  id="speacialist">
								</div>
								<div class="form-group">
									<textarea name="message" rows="6" placeholder="Message" id="comments"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="button primary"><i
										  class="fa fa-send"></i>Submit</button>
								</div>
							</form>
							<!--/ End Contact Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- blog breadcrumb version one strat here -->
</div>

@endsection