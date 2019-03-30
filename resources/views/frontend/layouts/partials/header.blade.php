<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                <p>Chào mừng bạn đến với <span>Nông nghiệp sạch</span>, đăng nhập để có trải nghiệm tốt nhất</p>
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
             
					@if(Auth::check())
          <a href="nguoidung"><i class="fa fa-user"></i>  {{Auth::user()->nd_name}}</a>
					<a href="mytin"></i>Tin của tôi </a>  &nbsp;&nbsp;&nbsp;
          <a href="dangxuat"></i>  Đăng xuất</a>                       					
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
            <a href="{{ route('frontend.home') }}" ><img src="{{asset('theme/farmie/img/core-img/logo1.png')}}" alt=""></a>
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


              </div>
              <!-- Navbar End -->
            </div>
          </nav>

          <!-- Search Form -->
           </div>
        </div>
      </div>
    </div>
  </header>
