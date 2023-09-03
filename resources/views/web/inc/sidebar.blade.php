<div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30">

    @if (request()->routeIs('user.*','chat.*','attendance.*','doctor.*'))
    <div class="sidebar -dashboard mt-5">

        <div class="sidebar__item ">
            <a href="{{ route('user.dashboard') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                <i class="text-20 icon-discovery mr-15"></i>
                Dashboard
            </a>
        </div>
        {{-- <div class="sidebar__item ">
            <a href="{{ route('attendance.index') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
        <i class="text-20 icon-edit mr-15"></i>
        Attendance
        </a>
    </div> --}}
    @if(Auth::user()->role == 2)

    <div class="sidebar__item ">
        <a href="{{ route('chat.inbox.doctor') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
            <i class="text-20 icon-discovery mr-15"></i>
            Chat
        </a>
    </div>
    <div class="sidebar__item ">
        <a href="{{route('user.appointments.index')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-play-button mr-15"></i>
            My Appointments
        </a>
    </div>
    <div class="sidebar__item ">
        <a href="{{ route('user.sales') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-play-button mr-15"></i>
            Sale List
        </a>
    </div>
    @else
    <div class="sidebar__item">
        <a href="{{ route('doctor.all') }}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
            <i class="text-20 icon-book mr-15"></i>
            Doctors
        </a>
    </div>
    <div class="sidebar__item ">
        <a href="{{ route('chat.inbox.patient') }}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
            <i class="text-20 icon-discovery mr-15"></i>
            Chat
        </a>
    </div>
    <div class="sidebar__item ">
        <a href="{{route('user.appointments.patient')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-play-button mr-15"></i>
            My Appointments
        </a>
    </div>
    <div class="sidebar__item ">
        <a href="{{ route('user.purchase') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-list mr-15"></i>
            Purchase List
        </a>
    </div>
    @endif
    @if(Auth::user()->role == 2)
    <div class="sidebar__item ">
        <a href="{{route('user.appointment.create')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-list mr-15"></i>
            Create Appointment
        </a>
    </div>

    @endif




    <div class="sidebar__item ">

        <a onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-power mr-15"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>

</div>
@else
<div class="sidebar -base-sidebar">
    <div class="sidebar__inner">
        <div>
            <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">General</div>
            <div>
                @if(Auth::user())
                <div class="sidebar__item ">
                    <a href="{{ route('user.dashboard') }}"
                      class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                        <i class="text-20 icon-discovery mr-15"></i>
                        Dashboard
                    </a>
                </div>
                @if(Auth::user()->role == 2)
                @else
                <div class="sidebar__item ">
                    <a href="{{route('appointment.all')}}"
                      class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                        <i class="text-20 icon-play-button mr-15"></i>
                        Appointments
                    </a>
                </div>
                <div class="sidebar__item">
                    <a href="{{ route('doctor.all') }}"
                      class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                        <i class="text-20 icon-book mr-15"></i>
                        Doctors
                    </a>
                </div>
                @endif

                @endif

                <div class="sidebar__item ">
                    <a href="{{ route('product.all') }}"
                      class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                        <i class="text-20 icon-list mr-15"></i>
                        Shop
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

</div>