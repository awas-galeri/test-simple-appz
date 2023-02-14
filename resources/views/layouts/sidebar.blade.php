<!-- SIDEBAR -->
<section id="sidebar">
    <a href="/" class="brand"><i class='bx bxs-smile icon'></i>Appz</a>
    <ul class="side-menu">
        <li><a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard*') ? 'active' : '' }}"><i
                    class='bx bxs-dashboard icon'></i> Dashboard</a></li>
        <li class="divider" data-text="main">Main</li>
        <li>
            <a href="" class="{{ request()->is('blog*') ? 'active' : '' }}"><i class='bx bxl-blogger icon'></i>
                Blog <i class='bx bx-chevron-right icon-right'></i></a>
            <ul class="side-dropdown">
                <li><a href="{{ url('blog') }}" class="{{ request()->is('blog*') ? 'active' : '' }}">Credit</a></li>
                {{-- <li><a href="#">Badges</a></li> --}}
                {{-- <li><a href="#">Breadcrumbs</a></li> --}}
                {{-- <li><a href="#">Button</a></li> --}}
            </ul>
        </li>
        <li>
            <a href="#" class="{{ request()->is('news*') ? 'active' : '' }}"><i class='bx bxs-news icon'></i> News
                <i class='bx bx-chevron-right icon-right'></i></a>
            <ul class="side-dropdown">
                <li><a href="{{ url('news') }}" class="{{ request()->is('news*') ? 'active' : '' }}">Credit</a></li>
                {{-- <li><a href="#">Badges</a></li> --}}
                {{-- <li><a href="#">Breadcrumbs</a></li> --}}
                {{-- <li><a href="#">Button</a></li> --}}
            </ul>
        </li>
        <li><a href="{{ url('movie') }}" class="{{ request()->is('movie*') ? 'active' : '' }}"><i
                    class='bx bx-film icon'></i> Movies</a></li>
        @if (auth()->user()->role_id == 1)
            <li><a href="{{ url('users') }}" class="{{ request()->is('users*') ? 'active' : '' }}"><i
                        class='bx bxs-user-account icon'></i> Users</a></li>
        @endif
        {{-- <li><a href="#"><i class='bx bxs-news icon'></i> News</a></li> --}}
        {{-- <li><a href="#"><i class='bx bxs-chart icon'></i> Charts</a></li> --}}
        {{-- <li><a href="#"><i class='bx bxs-widget icon'></i> Widgets</a></li> --}}
        {{-- <li class="divider" data-text="table and forms">Table and forms</li> --}}
        <li class="divider" data-text="setting">Setting</li>
        {{-- <li><a href="#"><i class='bx bx-table icon'></i> Tables</a></li> --}}
        {{-- <li><a href="{{ url('setting') }}" class="{{ request()->is('setting*') ? 'active' : '' }}"><i
                    class='bx bx-cog icon'></i> Setting</a></li> --}}
        <li><a href="{{ url('profile') }}" class="{{ request()->is('profile*') ? 'active' : '' }}"><i
                    class='bx bxs-user-detail icon'></i> Profile</a></li>
        <li><a href="{{ url('logout') }}"><i class='bx bxs-log-out-circle icon'></i> Logout</a></li>

        {{-- <li>
            <a href="#"><i class='bx bxs-notepad icon'></i> Forms <i
                    class='bx bx-chevron-right icon-right'></i></a>
            <ul class="side-dropdown">
                <li><a href="#">Basic</a></li>
                <li><a href="#">Select</a></li>
                <li><a href="#">Checkbox</a></li>
                <li><a href="#">Radio</a></li>
            </ul>
        </li> --}}
    </ul>
    {{-- <div class="ads">
        <div class="wrapper">
            <a href="#" class="btn-upgrade">Upgrade</a>
            <p>Become a <span>PRO</span> member and enjoy <span>All Features</span></p>
        </div>
    </div> --}}
</section>
<!-- SIDEBAR -->
