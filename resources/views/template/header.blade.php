<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center text-decoration-none">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Marketplace Katering</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0 text-decoration-none" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">Profile</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Luthfi</h6>
            <span>Customer</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ url('/merchant_profile') }}">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>