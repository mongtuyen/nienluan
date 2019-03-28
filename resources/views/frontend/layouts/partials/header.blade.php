<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                <p>Chào mừng bạn đến với <span>Farmie</span>, đăng nhập để có trải nghiệm tốt nhất</p>
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
             
					@if(Auth::check())
          <a href="nguoidung"><i class="fa fa-user"></i>  {{Auth::user()->nd_name}}</a>
					<a href="dangxuat"></i> Đăng xuất</a>                       					
					@else
						<a href="dangnhap"><i class="fa fa-user"></i> Đăng nhập</a>
						<a href="dangky">Đăng ký</a>
					@endif
         
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
            <a href="{{ route('frontend.home') }}" class="nav-brand"><img src="{{asset('theme/farmie/img/core-img/logo.png')}}" alt=""></a>
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
                <li class="{{ Request::is('') ? 'active-menu' : '' }}">
								<a href="{{ route('frontend.home') }}">Trang chủ</a>
							</li>
              <li class="{{ Request::is('') ? 'active-menu' : '' }}">
								<a href="{{ route('frontend.contact') }}">Liên hệ</a>
							</li>
              <li class="{{ Request::is('') ? 'active-menu' : '' }}">
								<a href="{{ route('frontend.tinmua') }}">Tin mua</a>
							</li>
              <li class="{{ Request::is('') ? 'active-menu' : '' }}">
								<a href="{{ route('frontend.tinban') }}">Tin bán</a>
							</li>


              
              <!-- <li><a href="about.html">Liên hệ</a></li>
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
                </ul> -->
                <!-- Search Icon -->
                <div id="searchIcon">
                  <i class="icon_search" aria-hidden="true"></i>
                  
                </div>
                <!-- Cart Icon -->
                <!-- <div id="cartIcon">
                  <a href="#">
                    <i class="icon_cart_alt" aria-hidden="true"></i>
                    <span class="cart-quantity">2</span>
                  </a>
                </div> -->
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
