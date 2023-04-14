
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
            <li class="{{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}"><i class="fas fa-user"></i>
                    <span>Data User</span></a>
            </li>
            <li class="{{ Request::is('ibu-hamil') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('ibu-hamil') }}"><i class="fas fa-person-pregnant"></i>
                    <span>Data Ibu Hamil</span></a>
            </li>
            <li class="{{ Request::is('bayi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('bayi') }}"><i class="fas fa-baby"></i>
                    <span>Data Bayi</span></a>
            </li>
            <li class="{{ Request::is('pemeriksaan-bayi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('pemeriksaan-bayi') }}"><i class="fas fa-file-prescription"></i>
                    <span>Data Pemeriksaan Bayi</span></a>
            </li>
            <li class="{{ Request::is('imunisasi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('imunisasi') }}"><i class="fas fa-syringe"></i>
                    <span>Data Imunisasi</span></a>
            </li>
            <li class="{{ Request::is('jadwal') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('jadwal') }}"><i class="fas fa-calendar-days"></i>
                    <span>Data Jadwal</span></a>
            </li>
            <li class="{{ Request::is('vitamins') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('vitamins') }}"><i class="fa-solid fa-tablets"></i>
                    <span>Data Vitamin</span></a>
            </li>
    </aside>
</div>
