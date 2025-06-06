<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Navbar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon"/>

  <!-- Fonts and icons -->
  <script src="{{ asset('frontend/js/plugin/webfont/webfont.min.js') }}"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["{{ asset('frontend/css/fonts.min.css') }}"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/plugins.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/kaiadmin.min.css') }}" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="{{ asset('frontend/css/demo.css') }}" />
</head>
<body>
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
      <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"></nav>
      <ul class="navbar-nav topbar-nav ms-auto align-items-center" style="margin-right: 0;">
      <li class="nav-item topbar-user dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic d-flex align-items-center" data-bs-toggle="dropdown" href="#" aria-expanded="false" style="margin-left: 0;">
        <div class="avatar-sm me-2">
          <img src="{{ asset('frontend/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded-circle" />
        </div>
        <span class="profile-username">
          <span class="op-7">Hi,</span>
          <span class="fw-bold">
          {{ Auth::check() ? explode(' ', Auth::user()->name)[0] : 'Guest' }}
          </span>
        </span>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
          <li>
          <div class="user-box">
            <div class="avatar-lg">
            <img src="{{ asset('frontend/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
            </div>
            <div class="u-text">
            <h4>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h4>
            <p class="text-muted">{{ Auth::check() ? Auth::user()->email : 'Unknown' }}</p>
            </div>
          </div>
          </li>
          <li>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
             class="dropdown-item">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          </li>
        </div>
        </ul>
      </li>
      </ul>
    </div>
  </nav>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
