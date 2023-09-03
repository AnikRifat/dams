@extends('web.app.app')

@section('main-body')
<div class="main-body">
    <section class="form-page js-mouse-move-container">
        <div class="form-page__content lg:py-50">
            <div class="container">
                <div class="row justify-center items-center">
                    <div class="col-xl-6 col-lg-8 mx-auto">
                        <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                            <h3 class="text-30 lh-13">{{ __('Reset Password') }}</h3>
                            <form method="POST" action="{{ route('password.update') }}"
                              class="contact-form respondForm__form row y-gap-20 pt-30">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="email">
                                        {{ __('Email Address') }}
                                    </label>
                                    <input id="email" type="email"
                                      class="form-control @error('email') is-invalid @enderror" name="email"
                                      value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="password">
                                        {{ __('Password') }}
                                    </label>
                                    <input id="password" type="password"
                                      class="form-control @error('password') is-invalid @enderror" name="password"
                                      required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="password-confirm">
                                        {{ __('Confirm Password') }}
                                    </label>
                                    <input id="password-confirm" type="password" class="form-control"
                                      name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                        {{ __('Reset Password') }}
                                    </button>
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