@extends('web.app.app')


@section('main-body')
<div class="dashboard-main">
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">


            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">

                        <table>
                            <tr>
                                <th>Appointment</th>
                                <th>Instructor</th>
                            </tr>
                            @foreach($order as $or)
                            <tr>
                                <td>{{$or->title}}</td>
                                <td>{{$or->name}}</td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer -dashboard py-30">
        <div class="row items-center justify-between">
            <div class="col-auto">
                <div class="text-13 lh-1">© 2022 Educrat. All Right Reserved.</div>
            </div>

            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center flex-wrap x-gap-20">
                        <div>
                            <a href="help-center.html" class="text-13 lh-1">Help</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Cookie Notice</a>
                        </div>
                        <div>
                            <a href="#" class="text-13 lh-1">Security</a>
                        </div>
                        <div>
                            <a href="terms.html" class="text-13 lh-1">Terms of Use</a>
                        </div>
                    </div>

                    <button class="button -md -rounded bg-light-4 text-light-1 ml-30">English</button>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection