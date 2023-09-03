<!DOCTYPE html>
<html lang="en">

    @include('web.inc.head')

    <body class="preloader-visible" data-barba="wrapper">
        <!-- preloader start -->
        <div class="preloader js-preloader">
            <div class="preloader__bg"></div>
        </div>
        <!-- preloader end -->

        <!-- barba container start -->
        <div class="barba-container" data-barba="container">


            <main class="main-content">

                @include('web.inc.header')

                <div class="content-wrapper js-content-wrapper">
                    <div class="dashboard -home-9 px-0 js-dashboard-home-9">



                        @include('web.inc.sidebar')




                        <div class="dashboard__main mt-0">
                            <div class="dashboard__content pt-0 px-15 pb-0">
                                @yield('main-body')

                            </div>
                            @if (request()->routeIs('appointment.details.*'))

                            @elsse
                            @include('web.inc.footer')
                            @endif
                        </div>
                    </div>
                </div>
            </main>
            @include('web.inc.aside')
        </div>
        <!-- barba container end -->

        <!-- JavaScript -->
        @include('web.inc.script')
    </body>

</html>