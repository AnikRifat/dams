

<section class="section-paddings">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title-version-2-black text-center">
                    <h2>Gallery from Travelars</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="gridbox">
                @foreach ($photos as $photo)

                <div><img src="{{ asset('uploads/photos/' . $photo->image) }}" alt=""></div>
                @endforeach


            </div>


        </div>
        <!-- gallery iteam start here -->
        {{-- <div class="grid-3">
            <div class="col-sm-12 col-md-6 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/1.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!-- end single gallery -->

            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/2.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!-- end single gallery -->

            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/3.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!-- end single gallery -->

            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/6.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!-- end single gallery -->

            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/4.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!--single gallery end -->

            <div class=" col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/5.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div>
            <!--single gallery end -->
            <!--single gallery -->
            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/7.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!--single gallery end -->

            <div class="col-sm-6 col-md-3 grid-item">
                <figure>
                    <img src="{{ asset('') }}assets/web/images/gallery/8.jpg" alt="">
                    <figcaption>
                        <a href="{{ asset('') }}assets/web/images/gallery/1.jpg"><i class="fa fa-pencil"></i></a>
                        <h4>Place <span>Eiffel Tower</span></h4>
                        <h4>Caption By: <span>Michel Jusi</span></h4>
                    </figcaption>
                </figure>
            </div> <!--single gallery end -->
        </div>  --}}
    </div>
</section> <!-- gallery section end here -->
