<ul class="navbar-nav bg-gradient-beige sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-icon">
            <img class="w-100" src="{{ asset('Gambar/logo.webp') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Safezone</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->role_id == '1')

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('manajemen.user') }}">
            <i class="bi bi-people-fill"></i>
            <span>Manajemen User</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('manajemen.konselor.index') }}">
            <i class="bi bi-person-hearts"></i>
            <span>Manajemen Konselor</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('manajemen.advokat.index') }}">
            <i class="bi bi-person-lines-fill"></i>
            <span>Manajemen Advokat</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('agenda.kegiatan.index') }}">
            <i class="bi bi-calendar2-event"></i>
            <span>Event Kegiatan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Report
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengaduan') }}">
            <i class="bi bi-book"></i>
            <span>Pengaduan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-hukum') }}">
            <i class="bi bi-bank"></i>
            <span>Pengajuan Hukum</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-konseling') }}">
            <i class="bi bi-person-hearts"></i>
            <span>Pengajuan Konseling</span></a>
    </li>


    @elseif(Auth::user()->role_id == 2)

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Report
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengaduan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengaduan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-hukum') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengajuan Hukum</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-konseling') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengajuan Konseling</span></a>
    </li>

    @else

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Report
    </div>

    <!-- Nav Item - Dashboard -->
     @if(Auth::user()->role_id == 4)
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-hukum') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengajuan Hukum</span></a>
    </li>
    @else
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('report.pengajuan-konseling') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengajuan Konseling</span></a>
    </li>
    @endif

    @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


</ul>