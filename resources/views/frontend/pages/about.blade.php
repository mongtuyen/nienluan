<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The Estate Teplate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/theestate/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('theme/theestate/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/theestate/styles/about_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/theestate/styles/about_responsive.css')}}">
</head>

<body>

<div class="super_container">
	
	<!-- Home -->
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url(theme/theestate/images/home_background.jpg)" ></div>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title">
							<h2>about us</h2>
						</div>
						<div class="breadcrumbs">
							<span><a href="{{ route('frontend.home') }}">Home</a></span>
							<span><a href="{{ route('frontend.about') }}"> Giới thiệu</a></span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->

	@include('frontend.layouts.partials.header')
	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-lg-1 order-2">
					<h2 class="intro_title">Sàn giao dịch nông sản</h2>
					<div class="intro_subtitle">Cầu nối giữa doanh nghiệp và nông dân</div>
					<p class="intro_text">Ngành nông nghiệp liên tiếp rơi vào tình cảnh "được mùa mất giá" là do nông dân Việt thiếu thông tin thị trường. Họ giống như người lái xe nhưng không thấy đường, như người lính trinh sát không có bản đồ, con tàu đi trên đại dương không có la bàn. </p>
					<div class="button intro_button trans_200"><a class="trans_200" href="#">read more</a></div>
				</div>
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="intro_image">
						<img src="{{ asset('theme/theestate/images/anh1.jpg')}}" alt="" >
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<div class="milestones_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('theme/theestate/images/milestones.jpg') }}"></div>
		<div class="container">
			<div class="row">
				
				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_1.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="310">0</div>
						<div class="milestone_text">houses sold</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_2.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="129">0</div>
						<div class="milestone_text">clients</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_3.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="14">0</div>
						<div class="milestone_text">agents</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_4.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="521">0</div>
						<div class="milestone_text">rents</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_5.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="1107">0</div>
						<div class="milestone_text">contracts</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-2 milestone_col">
					<div class="milestone text-center d-flex flex-column align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column justify-content-end"><img src="{{ asset('theme/theestate/images/milestone_6.svg')}}" alt=""></div>
						<div class="milestone_counter" data-end-value="39">0</div>
						<div class="milestone_text">investments</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Agents -->

	<div class="agents">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h3>out agents</h3>
						<span class="section_subtitle">The best out there</span>
					</div>
				</div>
			</div>

			<div class="row agents_row">
				
				<!-- Agent -->
				<div class="col-lg-3 agent_col text-center">
					<div class="agent_image mx-auto">
						<img src="{{ asset('theme/theestate/images/agent_1.jpg')}}" alt="image by Andrew Robles">
					</div>
					<div class="agent_content">
						<div class="agent_name">michael williams</div>
						<div class="agent_role">Real Estate Agent</div>
						<div class="agent_social">
							<ul class="agent_social_list">
								<li class="agent_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-3 agent_col text-center">
					<div class="agent_image mx-auto">
						<img src="{{ asset('theme/theestate/images/agent_2.jpg')}}" alt="https://unsplash.com/@gabrielsilverio">
					</div>
					<div class="agent_content">
						<div class="agent_name">michael williams</div>
						<div class="agent_role">Real Estate Agent</div>
						<div class="agent_social">
							<ul class="agent_social_list">
								<li class="agent_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-3 agent_col text-center">
					<div class="agent_image mx-auto">
						<img src="{{ asset('theme/theestate/images/agent_3.jpg')}}" alt="https://unsplash.com/@mehdizadeh">
					</div>
					<div class="agent_content">
						<div class="agent_name">michael williams</div>
						<div class="agent_role">Real Estate Agent</div>
						<div class="agent_social">
							<ul class="agent_social_list">
								<li class="agent_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-3 agent_col text-center">
					<div class="agent_image mx-auto">
						<img src="{{ asset('theme/theestate/images/agent_4.jpg')}}" alt="https://unsplash.com/@michaeldam">
					</div>
					<div class="agent_content">
						<div class="agent_name">michael williams</div>
						<div class="agent_role">Real Estate Agent</div>
						<div class="agent_social">
							<ul class="agent_social_list">
								<li class="agent_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="agent_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="agents_more">
						<div class="button agents_more_button trans_200"><a class="trans_200" href="#">read more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row row-equal-height">

				<div class="col-lg-6">
					<div class="newsletter_title">
						<h3>subscribe to our newsletter</h3>
						<span class="newsletter_subtitle">Get the latest offers</span>
					</div>
					<div class="newsletter_form_container">
						<form action="#">
							<div class="newsletter_form_content d-flex flex-row">
								<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Your email here" required="required" data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_200" value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-lg-6">
					<a href="#">
						<div class="weekly_offer">
							<div class="weekly_offer_content d-flex flex-row">
								<div class="weekly_offer_icon d-flex flex-column align-items-center justify-content-center">
									<img src="{{ asset('theme/theestate/images/prize.svg')}}" alt="">
								</div>
								<div class="weekly_offer_text text-center">weekly offer</div>
							</div>
							<div class="weekly_offer_image" style="background-image:url(theme/theestate/images/weekly.jpg)"></div>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	@include('frontend.layouts.partials.footer')

	<!-- Credits -->

	<div class="credits">
		<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
	</div>

</div>

<script src="{{ asset('theme/theestate/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('theme/theestate/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('theme/theestate/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/scrollTo/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('theme/theestate/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('theme/theestate/js/custom.js') }}"></script>
</body>

</html>

