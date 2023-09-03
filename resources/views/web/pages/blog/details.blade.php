@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">


                            <h1 class="page-header__title lh-14">
                                {{ $blog->title }}
                            </h1>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md">
        <div class="container">
            <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy loaded" data-ll-status="loaded"
              style="background-image: url({{ asset('uploads/blogs/'.$blog->image) }});"></div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="blogSection">
                <div class="blogCard">
                    <div class="row justify-center">
                        <div class="col-xl-8 col-lg-9 col-md-11">
                            <div class="blogCard__content">
                                {!!$blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="blogPost -comments">
                <div class="blogPost__content">
                    <h2 class="text-20 fw-500">
                        Reviews
                    </h2>

                    <ul class="comments__list mt-30">
                        <li class="comments__item">
                            <div class="comments__item-inner md:direction-column">
                                <div class="comments__img mr-20">
                                    <div class="bg-image rounded-full js-lazy loaded" data-ll-status="loaded"
                                      style="background-image: url(&quot;img/avatars/1.png&quot;);"></div>
                                </div>

                                @foreach ($comments as $comment)
                                <div class="comments__body md:mt-15">
                                    <div class="comments__header">
                                        <h4 class="text-13 fw-500 lh-15 text-bold">
                                            {{ $comment->user_name }}
                                            <span
                                              class="text-11 text-light-1 fw-400">{{ $comment->created_at->format("D Y ") }}</span>
                                        </h4>

                                        <div class="stars"></div>
                                    </div>

                                    <div class="comments__text mt-10">
                                        <p>{{ $comment->text }}</p>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="respondForm pt-30">
                <h3 class="text-16 fw-500">
                    Write a Review
                </h3>



                <form action="{{ route('comment.store') }}" class="contact-form respondForm__form row y-gap-30 pt-30"
                  method="POST">
                    @csrf

                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                    <input type="hidden" name="blog_id" value=" {{ $blog->id }}">
                    <div class="col-12">
                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Content</label>
                        <textarea name="text" placeholder="Message" rows="8"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection