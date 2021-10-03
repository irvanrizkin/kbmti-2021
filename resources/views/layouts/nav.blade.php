<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand ml-auto ms-lg-5" href="{{ route('guest.landing.home') }}">
      <img src="{{ asset('img/logo.svg') }}" alt="" width="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ route('guest.profile.index') == url()->current() ? 'active' : "" }}" href="{{ route('guest.profile.index') }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route('guest.department.index') == url()->current() ? 'active' : "" }}" href="{{ route('guest.department.index') }}">Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route('guest.berita.index') == url()->current() ? 'active' : "" }}" href="{{ route('guest.berita.index') }}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route('guest.products') == url()->current() ? 'active' : "" }}" href="{{ route('guest.products') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route('guest.open-recruitmen') == url()->current() ? 'active' : "" }}" href="{{ url('open-recruitment') }}">Open Recruitment</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
