<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>


        <li class="menu-title" key="t-menu">Web Contents</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-Shop">users</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('users.index') }}" key="t-list">All users</a></li>
                <li><a href="{{ route('users.patient') }}" key="t-list">patient</a></li>
                <li><a href="{{ route('users.patient.confirmation') }}" key="t-list">patient confirmation</a></li>
                <li><a href="{{ route('users.doctor') }}" key="t-list">doctor</a></li>
                <li><a href="{{ route('users.doctor.confirmation') }}" key="t-list">doctor confirmation</a></li>


            </ul>
        </li>
        {{-- start - attendance --}}
        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-attendance">Attendance</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('attendances.index') }}" key="t-list">All Attendance</a></li>

    </ul> --}}
    </li>
    {{-- End - attendance --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Chat">Chat</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('admin.chat.index') }}" key="t-list">All Chat</a></li>

        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Shop">Orders</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('orders.index') }}" key="t-list">All Orders</a></li>
            <li><a href="{{ route('orders.product') }}" key="t-list">Product</a></li>
            <li><a href="{{ route('orders.appointment') }}" key="t-list">Appointment</a></li>

        </ul>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Shop">Ledger sheets</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('profit.appointment.index') }}" key="t-list">Appointments</a></li>
            <li><a href="{{ route('profit.shop.index') }}" key="t-list">Shop</a></li>
            <li><a href="{{ route('profit.sale.index') }}" key="t-list">sale</a></li>
            <li><a href="{{ route('profit.chart.index') }}" key="t-list">charts</a></li>


        </ul>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Shop">Appointments</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('durations.index') }}" key="t-list">Timelines</a></li>
            <li><a href="{{ route('appointments.all') }}" key="t-list">All Appointments</a></li>

        </ul>
    </li>

    {{-- Shop --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Shop">Shop</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('products.index') }}" key="t-list">All Shop</a></li>
            <li><a href="{{ route('products.create') }}" key="t-create">Create Shop</a></li>

        </ul>
    </li>
    {{-- End - Category --}}
    {{-- Category --}}
    {{-- <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-Category">Category</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('categories.index') }}" key="t-list">All Category</a></li>
    <li><a href="{{ route('categories.create') }}" key="t-create">Create Category</a></li>

    </ul>
    </li> --}}
    {{-- End - Category --}}
    {{-- speacialist --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-speacialist">Speacialist</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('speacialists.index') }}" key="t-list">All Speacialist</a></li>
            <li><a href="{{ route('speacialists.create') }}" key="t-create">Create Speacialist</a></li>

        </ul>
    </li>
    {{-- End - speacialist --}}



    {{-- start - blog --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-blog">Blog</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('blogs.index') }}" key="t-list">All Blog</a></li>
            <li><a href="{{ route('blogs.create') }}" key="t-create">Create Blog</a></li>

        </ul>
    </li>
    {{-- End - blog --}}
    {{-- start - website-content --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-hero">Website Content</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('about.edit', 1) }}" key="t-list">About Us</a></li>
            <li><a href="{{ route('contact.edit', 1) }}" key="t-list">Contact Info</a></li>
            <li><a href="{{ route('general.edit', 1) }}" key="t-list">General Setting</a></li>

        </ul>

    </li>
    {{-- End - website-content --}}
    </ul>
</div>