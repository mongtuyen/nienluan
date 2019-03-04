<header class="header trans_300">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_container d-flex flex-row align-items-center trans_300">

						<!-- Logo -->

						<div class="logo_container">
							<a href="#">
								<div class="logo">
									<img src="{{ asset('theme/theestate/images/logo.png') }}" alt="">
									<span>the estate</span>
								</div>
							</a>
						</div>
						
						<!-- Main Navigation -->

						<nav class="main_nav">
							<ul class="main_nav_list">
	
								<li class="main_nav_item" class="{{ Request::is('') ? 'active-menu' : '' }}"><a href="{{ route('frontend.home') }}">home</a></li>
								<li class="main_nav_item" class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}"><a href="{{ route('frontend.about') }}">giới thiệu</a></li>
								<li class="main_nav_item"><a href="listings.html">listings</a></li>
								<li class="main_nav_item"><a href="news.html">news</a></li>
								<li class="main_nav_item"><a href="contact.html">liên hệ</a></li>
							</ul>
						</nav>
						
						<!-- Phone Home -->
						
						<div class="phone_home text-center">
						<div class="col-lg-7 text-lg-right header-top-right">
							@if(Auth::check())
					<div class="user-panel">
						<a href="{{route('profile.profile')}}"><i class="fas fa-users"></i></i>Xin Chào {{Auth::user()->name}}</a>
						<!-- <a href="{{route('dang-tin.create')}}"><i class="fas fa-plus-circle"></i> Đăng Tin</a> -->
						<a href="{{route('dang-nhap.getLogout')}}"><i class="fas fa-sign-out-alt"></i></i> Đăng Xuất</a>					</div>
					@else
					<div class="user-panel">
						<a href="{{route('dang-nhap.getLogin')}}"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
						<a href="{{route('dang-ky.getRegister')}}"><i class="fas fa-sign-in-alt"></i> Đăng Ký</a>
					</div>
					@endif
				</div>
							<span>+0080 234 567 84441</span>
						</div>
						
						<!-- Hamburger -->

						<div class="hamburger_container menu_mm">
							<div class="hamburger menu_mm">
								<i class="fas fa-bars trans_200 menu_mm"></i>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Menu -->

		<div class="menu menu_mm">
			<ul class="menu_list">
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="#">home</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="about.html">about us</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="listings.html">listings</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="news.html">news</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="contact.html">contact</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

	</header>