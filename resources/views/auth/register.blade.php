@extends('web.app.app')

@section('main-body')
<div class="main-body">

    <section class="form-page">


        <div class="form-page__content lg:py-50">
            <div class="container">
                <div class="row justify-center items-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                            <h3 class="text-30 lh-13">Sign Up</h3>
                            <p class="mt-10">Already have an account? <a href="{{ route('login') }}"
                                  class="text-purple-1">Log
                                    in</a></p>

                            <form class="contact-form respondForm__form row y-gap-20 pt-30"
                              action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="email">Email address
                                        *</label>
                                    <input type="email" id="email" value="{{ old('email') }}" name="email"
                                      placeholder="Email" required>
                                    @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="phone">Phone *</label>
                                    <input type="tel" id="phone" value="{{ old('phone') }}" name="phone"
                                      placeholder="Phone" required>
                                    @error('phone')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="name">Username
                                        *</label>
                                    <input type="text" id="name" value="{{ old('name') }}" name="name"
                                      placeholder="Username" required>
                                    @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Role *</label>
                                    <select name="role">
                                        <option value="">Select a role</option>
                                        <option value="1">Patient</option>
                                        <option value="2">Instructor</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="password">Password
                                        *</label>
                                    <input type="password" id="password" name="password" placeholder="Password"
                                      required>
                                    @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10" for="confirm-password">Confirm
                                        Password *</label>
                                    <input type="password" id="confirm-password" name="confirm-password"
                                      placeholder="Confirm Password" required>
                                    @error('confirm-password')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" name="submit" id="submit"
                                      class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                        Register
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
    </section>

    @endsection