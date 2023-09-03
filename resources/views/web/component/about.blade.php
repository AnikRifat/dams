


<section class="section-paddings welcome-area">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
					<h2>Welcome to The Sawari</h2>
				</div>
            </div>
			<div class="col-md-6">
				<div class="single-welcome-area">
					<div class="single-imag">
						<img src="{{ asset('uploads/content/' . $content->about_image) }}" alt="" class="img-thumbnail img-responsive">
					</div>
				</div>
			</div> <!-- welcome area left side end -->

			<div class="col-md-6">
				<div class="single-welcome-text">

						<div class="welcome-content">
							<p>{!! $content->about_content !!}</p>
							<a href="{{ route('about') }}" class="read-more hvr-fade">Read More</a>
						</div>

				</div>
			</div>  <!-- welcome area right side end -->
		</div>
	</div>
</section>
