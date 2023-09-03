@extends('web.app.app')

@section('main-body')
<div class="main-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                    <h3 class="text-30 lh-13">{{ __('Reset Password') }}</h3>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="contact-form respondForm__form row y-gap-20 pt-30" method="POST"
                          action="{{ route('password.email') }}">
                            @csrf

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="email">
                                    {{ __('Email Address') }}
                                </label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection