<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                <p>Welcome to <span>Farmie</span>, we hope you will enjoy our products and have good experience</p>
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
			  		@if(Auth::check())
					<div class="user-panel">
						<a href="{{route('profile.profile')}}"><i class="fas fa-users"></i></i>Xin Chào {{Auth::user()->name}}</a>
						<a href="{{route('dang-tin.create')}}"><i class="fas fa-plus-circle"></i> Đăng Tin</a>
						<a href="{{route('dang-nhap.getLogout')}}"><i class="fas fa-sign-out-alt"></i></i> Đăng Xuất</a>					</div>
					@else
					<div class="user-panel">
						<a href="{{route('dang-nhap.getLogin')}}" data-toggle="tooltip" data-placement="bottom" title="Đăng nhập"><i class="fa fa-user" aria-hidden="true"></i> Đăng Nhập</a>
						<a href="{{route('dang-ky.getRegister')}}" data-toggle="tooltip" data-placement="bottom" title="Đăng ký"><i class="fa fa-user" aria-hidden="true"></i> Đăng Ký</a>
					</div>
					@endif
                <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" title="Đăng nhập"><i class="fa fa-user" aria-hidden="true"></i> <span>Đăng nhập</span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Đăng ký"><i class="fa fa-user" aria-hidden="true"></i> <span>Đăng ký</span></a>
               -->
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="famie-main-menu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          <nav class="classy-navbar justify-content-between" id="famieNav">
            <!-- Nav Brand -->
            <a href="index.html" class="nav-brand"><img src="{{asset('theme/farmie/img/core-img/logo.png')}}" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
              <!-- Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>
              <!-- Navbar Start -->
              <div class="classynav">
                <ul>
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="#">Pages</a>
                    <ul class="dropdown">
                      <li><a href="index.html">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="farming-practice.html">Farming Practice</a></li>
                      <li><a href="shop.html">Shop</a>
                        <ul class="dropdown">
                          <li><a href="our-product.html">Our Products</a></li>
                          <li><a href="shop.html">Shop</a></li>
                        </ul>
                      </li>
                      <li><a href="news.html">News</a>
                        <ul class="dropdown">
                          <li><a href="news.html">News</a></li>
                          <li><a href="news-details.html">News Details</a></li>
                        </ul>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                    </ul>
                  </li>
                  <li><a href="our-product.html">Our Product</a></li>
                  <li><a href="farming-practice.html">Farming Practice</a></li>
                  <li><a href="news.html">News</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
                <!-- Search Icon -->
                <div id="searchIcon">
                  <i class="icon_search" aria-hidden="true"></i>
                </div>
                <!-- Cart Icon -->
                <div id="cartIcon">
                  <a href="#">
                    <i class="icon_cart_alt" aria-hidden="true"></i>
                    <span class="cart-quantity">2</span>
                  </a>
                </div>
              </div>
              <!-- Navbar End -->
            </div>
          </nav>

          <!-- Search Form -->
          <div class="search-form">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
              <button type="submit" class="d-none"></button>
            </form>
            <!-- Close Icon -->
            <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </div>
  </header>
