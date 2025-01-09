<header id="beranda">
  <nav>
    <div class="nav__bar">
      <div class="nav__logo"><img src="{{asset('Gambar/logo.webp')}}" alt="" height="80"></div>
      <ul class="nav__links">
        <li class="link"><a href="/#beranda">Beranda</a></li>
        <li class="link"><a href="/#pengaduan">Pengaduan</a></li>
        <li class="link"><a href="/#konseling">Konseling</a></li>
        <li class="link"><a href="/#hukum">Pendampingan Hukum</a></li>
        <li class="link"><a href="/#informasi">Informasi</a></li>
        <li class="link"><a href="/#kegiatan">Kegiatan</a></li><br>
        @if (Auth::check())
      <li class="link"><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>|<form id="logout-form"
        action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </li>
    @else
    <li class="link"><a href="{{ route('login') }}">Login</a>|<a href="{{ route('register') }}">Register</a></li>
  @endif
      </ul>
      <div class="icon__burger" onclick="NavMobile()">
        <version="1.0" encoding="utf-8" ?>
          <svg width="60px" height="60px" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 18L20 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
            <path d="M4 12L20 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
            <path d="M4 6L20 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
          </svg>
      </div>
    </div>
  </nav>
  @if (Request::is('/'))
    <div class="section__container header__container">
      <div class="text-header">Kamu tidak sendiri, <br>Kami siap mendengarkan dan mendukungmu</div>
    <h4>Mari bergandengan tangan untuk masa depan yang lebih baik.</h4>
    <a href="#pengaduan">
      <button class="btn"> Jelajahi <i class="ri-arrow-right-line"></i> </button>
    </a>
    </div>
  @endif
</header>
<section>
  <div class="navbar__mobile" id="navMobile">
    <div class="icon__close" onclick="NavMobile()">
      <version="1.0" encoding="utf-8" ?>
        <svg width="60px" height="60px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 17L16.8995 7.10051" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M7 7.00001L16.8995 16.8995" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <div class="list__menu__mobile">
      @if (Auth::check())
      <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
      </form>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @endif
      <a href="/#beranda">Beranda</a>
      <a href="/#pengaduan">Pengaduan</a>
      <a href="/#konseling">Konseling</a>
      <a href="/#hukum">Pendampingan Hukum</a>
      <a href="/#informasi">Informasi</a>
      <a href="/#kegiatan">Kegiatan</a>
    </div>
  </div>
</section>