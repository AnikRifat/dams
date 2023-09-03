@extends('web.app.app')

@section('main-body')
<div class="main-body">

    <section class="form-page js-mouse-move-container">


        <div class="form-page__content lg:py-50">
            <div class="container">
                <div class="row justify-center items-center">
                    <div class="col-xl-6 col-lg-8 mx-auto">
                        <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                            <h3 class="text-30 lh-13">Login</h3>
                            <p class="mt-10">Don't have an account yet? <a href="{{ route('register') }}"
                                  class="text-purple-1">Sign
                                    up for free</a></p>

                            <form class="contact-form respondForm__form row y-gap-20 pt-30"
                              action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-12">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="password">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Password"
                                      required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" id="submit"
                                      class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <p class="mt-10">Forget Passwword? <a href="{{ route('password.request') }}"
                                  class="text-purple-1">Reset password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection