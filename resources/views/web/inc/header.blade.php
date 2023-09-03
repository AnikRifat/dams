<header class="header -base-sidebar border-bottom-light bg-white js-header">
    <div class="header__container py-20 px-10">
        <div class="row justify-between items-center">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="header__explore text-dark-1">
                        <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
                            <i class="icon -dark-text-white icon-explore"></i>
                        </button>
                    </div>

                    <div class="header__logo ml-30 md:ml-20">
                        <a data-barba href="{{ route('index') }}">
                            <img class="-light-d-none" src="{{ asset('uploads/content/' . $content->website_logo) }}"
                              alt="logo">
                            <img class="-dark-d-none" src="{{ asset('uploads/content/' . $content->website_logo) }}"
                              alt="logo">
                        </a>
                    </div>

                    <form class="search-field rounded-16 h-50 -reverse-button -w-340 ml-90 xl:ml-20 lg:d-none"
                      action="{{ route('search') }}" method="POST">
                        @csrf
                        <input class="bg-light-4 pr-50" type="text" placeholder="What do you want to learn?"
                          name="appointments">
                        <button class="text-light-1" type="submit">
                            <i class="icon-search text-20"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center sm:d-none">
                        <div>
                            <button
                              class="js-darkmode-toggle text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                <i class="text-light-1 text-24 icon icon-night"></i>
                            </button>
                        </div>

                        <div class="relative">
                            <button data-maximize
                              class="text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                <i class="text-24 icon icon-maximize"></i>
                            </button>
                        </div>


                        <div class="relative ">


                            <div class="toggle-element js-cart-toggle">
                                <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                                    <div class="px-30 pt-30 pb-10">

                                        <div class="row justify-between x-gap-40 pb-20">
                                            <div class="col">
                                                <div class="row x-gap-10 y-gap-10">
                                                    <div class="col-auto">
                                                        <img src="{{ asset('') }}assets/web/img/menus/cart/1.png"
                                                          alt="image">
                                                    </div>

                                                    <div class="col">
                                                        <div class="text-dark-1 lh-15">The Ultimate Drawing Appointment
                                                            Beginner to Advanced...</div>

                                                        <div class="d-flex items-center mt-10">
                                                            <div class="lh-12 fw-500 line-through text-light-1 mr-10">
                                                                $179</div>
                                                            <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <button><img src="{{ asset('') }}assets/web/img/menus/close.svg"
                                                      alt="icon"></button>
                                            </div>
                                        </div>

                                        <div class="row justify-between x-gap-40 pb-20">
                                            <div class="col">
                                                <div class="row x-gap-10 y-gap-10">
                                                    <div class="col-auto">
                                                        <img src="{{ asset('') }}assets/web/img/menus/cart/2.png"
                                                          alt="image">
                                                    </div>

                                                    <div class="col">
                                                        <div class="text-dark-1 lh-15">User Experience Design Essentials
                                                            - Adobe XD UI UX...</div>

                                                        <div class="d-flex items-center mt-10">
                                                            <div class="lh-12 fw-500 line-through text-light-1 mr-10">
                                                                $179</div>
                                                            <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <button><img src="{{ asset('') }}assets/web/img/menus/close.svg"
                                                      alt="icon"></button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="px-30 pt-20 pb-30 border-top-light">
                                        <div class="d-flex justify-between">
                                            <div class="text-18 lh-12 text-dark-1 fw-500">Total:</div>
                                            <div class="text-18 lh-12 text-dark-1 fw-500">$659</div>
                                        </div>

                                        <div class="row x-gap-20 y-gap-10 pt-30">
                                            <div class="col-sm-6">
                                                <button
                                                  class="button py-20 -dark-1 text-white -dark-button-white col-12">View
                                                    Cart</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button
                                                  class="button py-20 -purple-1 text-white col-12">Checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @auth
                        <div class="relative">
                            <a href="#"
                              class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                              data-el-toggle=".js-msg-toggle">
                                <i class="text-24 icon icon-email"></i>
                            </a>
                        </div>
                        <div class="relative">
                            <a href="#"
                              class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                              data-el-toggle=".js-notif-toggle">
                                <i class="text-24 icon icon-notification"></i>
                            </a>

                            <div class="toggle-element js-notif-toggle">
                                <div
                                  class="toggle-bottom -notifications bg-white shadow-4 border-light rounded-8 mt-10">
                                    <div class="py-30 px-30">
                                        <div class="y-gap-40">

                                            <div class="d-flex items-center ">
                                                <div class="shrink-0">
                                                    <img src="{{ asset('') }}assets/web/img/dashboard/actions/1.png"
                                                      alt="image">
                                                </div>
                                                <div class="ml-12">
                                                    <h4 class="text-15 lh-1 fw-500 -dark-text-dark-1">Your resume
                                                        updated!</h4>
                                                    <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                                                </div>
                                            </div>

                                            <div class="d-flex items-center border-top-light -dark-border-top-light-5">
                                                <div class="shrink-0">
                                                    <img src="{{ asset('') }}assets/web/img/dashboard/actions/2.png"
                                                      alt="image">
                                                </div>
                                                <div class="ml-12">
                                                    <h4 class="text-15 lh-1 fw-500 -dark-text-dark-1">You changed
                                                        password</h4>
                                                    <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                                                </div>
                                            </div>

                                            <div class="d-flex items-center border-top-light -dark-border-top-light-5">
                                                <div class="shrink-0">
                                                    <img src="{{ asset('') }}assets/web/img/dashboard/actions/3.png"
                                                      alt="image">
                                                </div>
                                                <div class="ml-12">
                                                    <h4 class="text-15 lh-1 fw-500 -dark-text-dark-1">Your account has
                                                        been created successfully</h4>
                                                    <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                                                </div>
                                            </div>

                                            <div class="d-flex items-center border-top-light -dark-border-top-light-5">
                                                <div class="shrink-0">
                                                    <img src="{{ asset('') }}assets/web/img/dashboard/actions/4.png"
                                                      alt="image">
                                                </div>
                                                <div class="ml-12">
                                                    <h4 class="text-15 lh-1 fw-500 -dark-text-dark-1">You applied for a
                                                        job Front-end Developer</h4>
                                                    <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                                                </div>
                                            </div>

                                            <div class="d-flex items-center border-top-light -dark-border-top-light-5">
                                                <div class="shrink-0">
                                                    <img src="{{ asset('') }}assets/web/img/dashboard/actions/5.png"
                                                      alt="image">
                                                </div>
                                                <div class="ml-12">
                                                    <h4 class="text-15 lh-1 fw-500 -dark-text-dark-1">Your appointment
                                                        uploaded successfully</h4>
                                                    <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>


                    @auth
                    <div class="relative d-flex items-center ml-10">
                        <a href="#" data-el-toggle=".js-profile-toggle">
                            @if(Auth::user()->patient || Auth::user()->doctor)
                            @if (Auth::user()->role == 1)

                            <img class="size-50" src="{{ asset('uploads/patients/'.Auth::user()->patient->image) }}"
                              alt="image">

                            @elseif(Auth::user()->role == 2)
                            <img class="size-50" src="{{ asset('uploads/doctors/'.Auth::user()->doctor->image) }}"
                              alt="image">
                            @else
                            <img class="size-50" src="{{ asset('/') }}assets/web/img/misc/user-profile.png" alt="image">
                            @endif

                            @else
                            <img class="size-50" src="{{ asset('/') }}assets/web/img/misc/user-profile-2.png"
                              alt="image">
                            @endif


                        </a>

                        <div class="toggle-element js-profile-toggle">
                            <div class="toggle-bottom -profile bg-white shadow-4 border-light rounded-8 mt-10">
                                <div class="px-30 py-30">

                                    <div class="sidebar -dashboard">

                                        <div class="sidebar__item bg-dark">
                                            <p class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                                <i class="text-20 icon-discovery mr-15"></i>
                                                {{ Auth::user()->name }}
                                            </p>
                                        </div>
                                        <div class="sidebar__item">
                                            <a href="{{ route('user.dashboard') }}"
                                              class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                                <i class="text-20 icon-discovery mr-15"></i>
                                                Settings
                                            </a>
                                        </div>



                                        <div class="sidebar__item ">
                                            <a onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                              class="d-flex items-center text-17 lh-1 fw-500 ">
                                                <i class="text-20 icon-power mr-15"></i>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="header-right d-flex items-center">
                        <div class="header-right__icons text-white d-flex items-center">



                            <div class="d-none xl:d-block pl-20 sm:pl-15">
                                <button class="text-dark-1 items-center" data-el-toggle=".js-mobile-menu-toggle">
                                    <i class="text-11 icon icon-mobile-menu"></i>
                                </button>
                            </div>

                        </div>

                        <div class="header-right__buttons d-flex items-center ml-30 xl:ml-20 lg:d-none">
                            <a href="{{ route('login') }}" class="button -underline text-purple-1">Log in</a>
                            <a href="{{ route('register') }}"
                              class="button h-50 px-30 -purple-1 -rounded text-white ml-20">Sign
                                up</a>
                        </div>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</header>