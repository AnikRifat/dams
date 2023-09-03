<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row y-gap-20 justify-between items-end">
            <div class="col-auto">

                <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Top Speacialists</h2>
                </div>

            </div>

            <div class="col-auto">

                <a href="#" class="button -icon -purple-3 text-purple-1">
                    All Speacialists
                    <i class="icon-arrow-top-right text-13 ml-10"></i>
                </a>

            </div>
        </div>

        <div data-anim-wrap="" class="row y-gap-30 pt-50 animated">

            @foreach ($categories as $category)
            <div class="col-xl-3 col-md-6 is-in-view" data-anim-child="scale delay-1">
                <a href="#" class="categoryCard -type-4">
                    <div class="categoryCard__icon bg-light-3">
                        <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="">
                    </div>
                    <div class="categoryCard__content mt-10">
                        <h4 class="categoryCard__title text-17 fw-500">{{ $category->title }}</h4>
                        <div class="categoryCard__text text-13 text-light-1 lh-1 mt-5">{{ $category->description }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach



        </div>
    </div>
</section>