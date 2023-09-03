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
                            <h2>Blog Post</h2>
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li class="active"><a href="blog-single.html">Blog-Post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- blog breadcrumb version one end here -->



<!-- blog breadcrumb version one strat here -->
</div>

@endsection
