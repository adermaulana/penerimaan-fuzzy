<header id="header" class="header fixed-top">
  <div class="container-fluid container-md d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo pb-1 d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span>MA Manuju</span>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto {{ ($title === 'Landing Page') ? 'active' : '' }}" href="/">Home</a></li>
        <li><a class="nav-link scrollto {{ ($title === 'Data Siswa') ? 'active' : '' }}" href="/data_siswa/">Daftar</a></li>
        <li><a class="nav-link scrollto {{ ($title === 'Data Hasil') ? 'active' : '' }}" href="/menu_hasil">Info</a></li>
        <li class="dropdown"><a class="nav-link scrollto {{ ($title === 'Data Nilai Rapor') || ($title === 'Data Ijazah') || ($title === 'Data Jarak Rumah') ? 'active' : '' }}" href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/rapor">Input Nilai Raport</a></li>
            <li><a href="/ijazah">Input Nilai Ijazah</a></li>
            <li><a href="/jarak_rumah">Input Jarak Rumah</a></li>
          </ul>
        </li>
        @auth('peserta')
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="getstarted scrollto">
            Logout
          </button>
        </form>
        @elseif(Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="getstarted scrollto">
            Logout
          </button>
        </form>
        @else
        <li><a class="getstarted scrollto" href="/login">Login</a></li>
        @endauth
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->