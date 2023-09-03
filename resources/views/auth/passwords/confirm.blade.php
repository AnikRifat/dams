@extends('web.app.app')

@section('main-body')
<div class="main-body">
    <section class="form-page js-mouse-move-container">
        <div class="form-page__content lg:py-50">
            <div class="container">
                <div class="row justify-center items-center">
                    <div class="col-xl-6 col-lg-8 mx-auto">
                        <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                            <h3 class="text-30 lh-13">Confirm Password</h3>
                            <p class="mt-10">{{ __('Please confirm your password before continuing.') }}</p>

                            <form class="contact-form respondForm__form row y-gap-20 pt-30" method="POST"
                              action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="password">
                                        {{ __('Password') }}
                                    </label>

                                    <input id="password" type="password"
                                      class="form-control @error('password') is-invalid @enderror" name="password"
                                      required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-purple-1">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection