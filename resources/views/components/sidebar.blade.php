<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Posyandu Harmoni BTU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PH BTU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Kader Posyandu</li>
            <li class="{{ str_contains(request()->url(), 'user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('user') }}"><i class="fas fa-user"></i>
                    <span>Data User</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'ibuhamil') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ibuhamil') }}"><i class="fas fa-person-pregnant"></i>
                    <span>Data Ibu Hamil</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'balita') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('balita') }}"><i class="fas fa-baby"></i>
                    <span>Data Balita</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'pemeriksaan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('pemeriksaan') }}"><i class="fas fa-file-prescription"></i>
                    <span>Data Pemeriksaan</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'imunisasi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('imunisasi') }}"><i class="fas fa-syringe"></i>
                    <span>Data Imunisasi</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'penimbangan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('penimbangan') }}"><i class="fas fa-weight-scale"></i>
                    <span>Data Penimbangan</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'jadwal') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('jadwal') }}"><i class="fas fa-calendar-days"></i>
                    <span>Data Jadwal</span></a>
            </li>
            <li class="{{ str_contains(request()->url(), 'vitamin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('vitamin') }}"><i class="fa-solid fa-tablets"></i>
                    <span>Data Vitamin</span></a>
            </li>
    </aside>
</div>
