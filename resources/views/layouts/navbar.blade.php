<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

    @if (Auth::user()->role == 'admin')
      <a class="navbar-brand" href="#">Anda login sebagai Admin!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">Anggota</a></li>
              <li><a class="dropdown-item" href="">Buku</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="">Peminjaman</a></li>
              <li><a class="dropdown-item" href="#">Pengembalian</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
    @endif

    @if (Auth::user()->role == 'client')
      <a class="navbar-brand" href="#">Selamat datang {{ Auth::user()->name }}!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
    @endif

    @if (Auth::user()->role == 'superadmin')
    <a class="navbar-brand" href="#">Halo {{ Auth::user()->name }} anda login sebagai Superadmin!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Pengguna
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('user') }}">User</a></li>
            <li><a class="dropdown-item" href=""></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href=""></a></li>
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
    @endif

      <a href="{{ route('logout') }}" class="btn btn-outline-danger" type="submit">Logout</a>

    </div>
  </nav>
