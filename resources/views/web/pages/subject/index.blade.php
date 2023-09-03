@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">Speacialist List</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">

            <div class="pt-60 lg:pt-40">

                <div class="row">

                    @foreach ($speacialists as $item)
                    <div class="col-md-2">
                        <div class="bg-dark-2 text-center my-5">
                            <a href="{{ route('speacialist.details',$item->id) }}">
                                <img class="w-1/1" src="{{ asset('uploads/speacialists/' . $item->image) }}" alt="book">
                                <h5 class="text-white fw-500 py-5 text-11 ">{{ $item->title }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>



</div>

@endsection