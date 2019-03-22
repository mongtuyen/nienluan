<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <title>Famie - Farm Services &amp; Organic Food Store Template | Home</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('theme/farmie/img/core-img/favicon.ico') }}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet"  href="{{ asset('theme/farmie/style.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('theme/farmie/css/custom-styles.css') }}">

  @yield('custom-css')
</head>

<body>

<!-- Preloader -->
	<div class="preloader d-flex align-items-center justify-content-center">
    	<div class="spinner"></div>
  	</div>

	<!-- Header -->

  	@include('frontend.layouts.partials.header')


  	@yield('main-content')
	 <!-- ##### Hero Area Start ##### -->
	 <div class="hero-area">
    <div class="welcome-slides owl-carousel">

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(theme/farmie/img/bg-img/1.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInUp" data-delay="200ms">The hearth of the farm is the true center of our universe.</h2>
                <p data-animation="fadeInUp" data-delay="400ms">Mauris vestibulum dolor nec lacinia facilisis. Fusce interdum sagittis volutpat. Praesent eget varius ligula, malesuada eleifend purus. Aenean euismod est at mauris mollis ultricies.
                  Morbi arcu mi, dictum eu luala, dapibus
                  interdum mollis.</p>
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(theme/farmie/img/bg-img/7.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInDown" data-delay="200ms">The hearth of the farm is the true center of our universe.</h2>
                <p data-animation="fadeInDown" data-delay="400ms">Mauris vestibulum dolor nec lacinia facilisis. Fusce interdum sagittis volutpat. Praesent eget varius ligula, malesuada eleifend purus. Aenean euismod est at mauris mollis ultricies.
                  Morbi arcu mi, dictum eu luala, dapibus
                  interdum mollis.</p>
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Famie Benefits Area Start ##### -->
  <section class="famie-benefits-area section-padding-100-0 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="benefits-thumbnail mb-50">
            <img src="{{asset('theme/farmie/img/bg-img/2.jpg')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="100ms">
            <img src="{{asset('theme/farmie/img/core-img/digger.png')}}" alt="">
            <h5>Best Services</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <img src="{{asset('theme/farmie/img/core-img/windmill.png')}}" alt="">
            <h5>Farm Experiences</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="500ms">
            <img src="{{asset('theme/farmie/img/core-img/cereals.png')}}" alt="">
            <h5>100% Natural</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="700ms">
            <img src="{{asset('theme/farmie/img/core-img/tractor.png')}}" alt="">
            <h5>Farm Equipment</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
            <img src="{{asset('theme/farmie/img/core-img/sunrise.png')}}" alt="">
            <h5>Organic food</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Famie Benefits Area End ##### -->

  <!-- ##### About Us Area Start ##### -->
  <section class="about-us-area">
    <div class="container">
      <div class="row align-items-center">

        <!-- About Us Content -->
        <div class="col-12 col-md-8">
          <div class="about-us-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>About us</p>
              <h2><span>Let Us</span> Tell You Our Story</h2>
              <img src="{{asset('theme/farmie/img/core-img/decor.png')}}" alt="">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit. Etiam nunc elit, pretium atlanta urna veloci, fermentum malesuda mina. Donec auctor nislec neque sagittis, sit amet dapibus pellentesque donal feugiat. Nulla mollis magna non
              sanaliquet, volutpat do zutum, ultrices consectetur, ultrices at purus.</p>
            <a href="#" class="btn famie-btn mt-30">Read More</a>
          </div>
        </div>

        <!-- Famie Video Play -->
        <div class="col-12 col-md-4">
          <div class="famie-video-play mb-100">
            <img src="{{asset('theme/farmie/img/bg-img/6.jpg')}}" alt="">
            <!-- Play Icon -->
            <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-icon"><i class="fa fa-play"></i></a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ##### About Us Area End ##### -->

  <!-- ##### Services Area Start ##### -->
  <section class="services-area d-flex flex-wrap">
    <!-- Service Thumbnail -->
    <div class="services-thumbnail bg-img jarallax" style="background-image: url('theme/farmie/img/bg-img/7.jpg');"></div>

    <!-- Service Content -->
    <div class="services-content section-padding-100-50 px-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>What we do</p>
              <h2><span>Our Produce</span> Is Mainstay For Us</h2>
              <img src="{{asset('theme/farmie/img/core-img/decor.png')}}" alt="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-50">
            <p>Mauris fermentum nunc quis massa lacinia consequat. Suspendisse orci magna, pharetra sedonia risus ut,
              elementum mollis nisin. Nunc in sapien turpis. Donec egeto david orci pulvinar ultrices necto drax turpis.
              Pellentesque justo metus, semper nec ullamcorper id, gravida ultricies arcu.</p>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="100ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="{{asset('theme/farmie/img/core-img/s1.png')}}" alt="">
                <h5>Fruit &amp; Vegetable</h5>
              </div>
              <p>Intiam eu sagittis est, aster cosmo lacini libero. Praesent dignissim sed odio velo aliquam manta legolas. </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="300ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="{{asset('theme/farmie/img/core-img/s2.png')}}" alt="">
                <h5>Meat &amp; Eggs</h5>
              </div>
              <p>Intiam eu sagittis est, aster cosmo lacini libero. Praesent dignissim sed odio velo aliquam manta legolas. </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="500ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="{{asset('theme/farmie/img/core-img/s3.png')}}" alt="">
                <h5>Milk &amp; Cheese</h5>
              </div>
              <p>Intiam eu sagittis est, aster cosmo lacini libero. Praesent dignissim sed odio velo aliquam manta legolas. </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="700ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="{{asset('theme/farmie/img/core-img/s4.png')}}" alt="">
                <h5>Rice &amp; Corn</h5>
              </div>
              <p>Intiam eu sagittis est, aster cosmo lacini libero. Praesent dignissim sed odio velo aliquam manta legolas. </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- ##### Services Area End ##### -->

  <!-- ##### Our Products Area Start ##### -->
  <section class="our-products-area section-padding-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>Featured Products</p>
            <h2><span>Our Product</span> Are Highest Quality</h2>
            <img src="{{asset('theme/farmie/img/core-img/decor2.png')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/p1.jpg')}}" alt="">
              <!-- Product Tags -->
              <span class="product-tags">Hot</span>
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Favourite"><i class="icon_heart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon_cart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="arrow_left-right_alt"></i></a>
              </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Strawberry</a>
              <h6 class="price">$17.99</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="300ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/p2.jpg')}}" alt="">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Favourite"><i class="icon_heart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon_cart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="arrow_left-right_alt"></i></a>
              </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Baked Breads</a>
              <h6 class="price">$9.99</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="500ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/p3.jpg')}}" alt="">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Favourite"><i class="icon_heart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon_cart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="arrow_left-right_alt"></i></a>
              </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Prime Beef</a>
              <h6 class="price">$59.99</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="700ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/p4.jpg')}}" alt="">
              <!-- Product Tags -->
              <span class="product-tags bg-danger">Sale</span>
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Favourite"><i class="icon_heart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon_cart_alt"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="arrow_left-right_alt"></i></a>
              </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Pure Honey</a>
              <h6 class="price"><span>$29.99</span> $19.99</h6>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="gotoshop-btn text-center wow fadeInUp" data-wow-delay="900ms">
            <a href="shop.html" class="btn famie-btn">Go to Store</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Our Products Area End ##### -->

  <!-- ##### Newsletter Area Start ##### -->
  <section class="newsletter-area section-padding-100 bg-img bg-overlay jarallax" style="background-image: url('theme/farmie/img/bg-img/8.jpg');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="newsletter-content">
            <!-- Section Heading -->
            <div class="section-heading white text-center">
              <p>What we do</p>
              <h2><span>Our Produce</span> Is Mainstay For Us</h2>
              <img src="{{asset('theme/farmie/img/core-img/decor2.png')}}" alt="">
            </div>
            <p class="text-white mb-50 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at diam convallis ligula cursus bibendum sed at enim. Class aptent taciti sociosqu ad litora torquent conubia nostra, per inceptos
              himenaeos.</p>
          </div>
        </div>
      </div>
      <!-- Newsletter Form -->
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn famie-btn">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Newsletter Area End ##### -->

  <!-- ##### Farming Practice Area Start ##### -->
  <section class="farming-practice-area section-padding-100-50">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>Make the green world</p>
            <h2><span>Farming Practices</span> To Preserve Land & Water</h2>
            <img src="{{asset('theme/farmie/img/core-img/decor2.png')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="100ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/9.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/chicken.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Chicken Farmed For Meat</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="200ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/10.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/pig.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Pig Farm Management</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="300ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/11.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/cow.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Beef Cattle Farming</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="400ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/12.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/cereal.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Improved Rice Cultivation</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="500ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/13.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/sprout.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Soil Improvement Techniques</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

        <!-- Single Farming Practice Area -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-farming-practice-area mb-50 wow fadeInUp" data-wow-delay="600ms">
            <!-- Thumbnail -->
            <div class="farming-practice-thumbnail">
              <img src="{{asset('theme/farmie/img/bg-img/14.jpg')}}" alt="">
            </div>
            <!-- Content -->
            <div class="farming-practice-content text-center">
              <!-- Icon -->
              <div class="farming-icon">
                <img src="{{asset('theme/farmie/img/core-img/vegetable.png')}}" alt="">
              </div>
              <span>Farming practice for</span>
              <h4>Intensive Fruit Farming</h4>
              <p>Donec nec justo eget felis facilisis ferme ntum. Aliquam portitor mauris sit amet orci. donec salim...</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ##### Farming Practice Area End ##### -->

  <!-- ##### Testimonial Area Start ##### -->
  <section class="testimonial-area bg-img bg-overlay section-padding-100 jarallax" style="background-image: url('theme/farmie/img/bg-img/15.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Testimonial Slides -->
          <div class="testimonial-slides owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
              <!-- Testimonial Text -->
              <div class="testi-text d-flex">
                <div class="quote-icon">
                  <img src="{{asset('theme/farmie/img/core-img/quote.png')}}" alt="">
                </div>
                <h5>"Thank you for your organic products. My children like your products and they use for breakfast. We are loving the pure milk, freshly fruit and of course our staple, Brown Rice Bread. Your Gluten Free breads truly make me feel
                  lighter and uplifted. It's the only bread I plan to eat for the rest of my life. I will use them for many years."</h5>
              </div>
              <!-- Testimonial Thumbnail Name -->
              <div class="testimonial-thumbnail-name d-flex align-items-center">
                <div class="testimonial-thumbnail">
                  <img src="{{asset('theme/farmie/img/bg-img/16.jpg')}}" alt="">
                </div>
                <div class="testimonial-name">
                  <h5>Mrs Lara Sullivan</h5>
                  <h6>Customer</h6>
                </div>
              </div>
            </div>

            <!-- Single Slide -->
            <div class="single-slide">
              <!-- Testimonial Text -->
              <div class="testi-text d-flex">
                <div class="quote-icon">
                  <img src="{{asset('theme/farmie/img/core-img/quote.png')}}" alt="">
                </div>
                <h5>"Thank you for your organic products. My children like your products and they use for breakfast. We are loving the pure milk, freshly fruit and of course our staple, Brown Rice Bread. Your Gluten Free breads truly make me feel
                  lighter and uplifted. It's the only bread I plan to eat for the rest of my life. I will use them for many years."</h5>
              </div>
              <!-- Testimonial Thumbnail Name -->
              <div class="testimonial-thumbnail-name d-flex align-items-center">
                <div class="testimonial-thumbnail">
                  <img src="{{asset('theme/farmie/img/bg-img/16.jpg')}}" alt="">
                </div>
                <div class="testimonial-name">
                  <h5>Ajoy Das</h5>
                  <h6>Client</h6>
                </div>
              </div>
            </div>

            <!-- Single Slide -->
            <div class="single-slide">
              <!-- Testimonial Text -->
              <div class="testi-text d-flex">
                <div class="quote-icon">
                  <img src="{{asset('theme/farmie/img/core-img/quote.png')}}" alt="">
                </div>
                <h5>"Thank you for your organic products. My children like your products and they use for breakfast. We are loving the pure milk, freshly fruit and of course our staple, Brown Rice Bread. Your Gluten Free breads truly make me feel
                  lighter and uplifted. It's the only bread I plan to eat for the rest of my life. I will use them for many years."</h5>
              </div>
              <!-- Testimonial Thumbnail Name -->
              <div class="testimonial-thumbnail-name d-flex align-items-center">
                <div class="testimonial-thumbnail">
                  <img src="{{asset('theme/farmie/img/bg-img/16.jpg')}}" alt="">
                </div>
                <div class="testimonial-name">
                  <h5>Akash Khan</h5>
                  <h6>Customer</h6>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Testimonial Area End ##### -->

  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area section-padding-100-0">
    <div class="container">
      <div class="row justify-content-between">

        <!-- Contact Content -->
        <div class="col-12 col-lg-5">
          <div class="contact-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>Contact now</p>
              <h2><span>Get In Touch</span> With Us</h2>
              <img src="{{asset('theme/farmie/img/core-img/decor.png')}}" alt="">
            </div>
            <!-- Contact Form Area -->
            <div class="contact-form-area">
              <form action="index.html" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                  </div>
                  <div class="col-lg-6">
                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                  </div>
                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Your Subject">
                  </div>
                  <div class="col-12">
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn famie-btn">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Contact Maps -->
        <div class="col-lg-6">
          <div class="contact-maps mb-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28313.28917392649!2d-88.2740948914384!3d41.76219337461615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880efa1199df6109%3A0x8a1293b2ae8e0497!2sE+New+York+St%2C+Aurora%2C+IL%2C+USA!5e0!3m2!1sen!2sbd!4v1542893000723"
              allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Contact Area End ##### -->

  <!-- ##### News Area Start ##### -->
  <section class="news-area bg-gray section-padding-100-0">
    <div class="container">
      <div class="row">

        <!-- Featured Post Area -->
        <div class="col-12 col-lg-6">
          <div class="featured-post-area mb-100 wow fadeInUp" data-wow-delay="100ms">
            <img src="{{asset('theme/farmie/img/bg-img/17.jpg')}}" alt="">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Carlos Bacca</a></h6>
              <a href="#" class="post-title">Why innovation is key to maintaining our export market share</a>
            </div>
          </div>
        </div>

        <!-- Single Blog Area -->
        <div class="col-12 col-lg-6 mb-100">

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Rising cattle supplies see beef export lifted</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="500ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Cattle marts: Cows take a hit at the ringside</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

          <!-- Single Blog Area -->
          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="700ms">
            <!-- Post Content -->
            <div class="post-content">
              <h6>Post on <a href="#">18 Aug 2018</a> / <a href="#">Peter Crough</a></h6>
              <a href="#" class="post-title">Malting barley price set to commence</a>
              <p>Maecenas facilisis quam orcit, velo porttitor arcu egestas eu. Maecenas donald imperdiet nibh, quis. Etiam non scelerisque exited sagittis...</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- ##### News Area End ##### -->

	<!-- Footer -->
  	@include('frontend.layouts.partials.footer')
	
 <!-- ##### All Javascript Files ##### -->
  <!-- jquery 2.2.4  -->
  <script src="{{asset('theme/farmie/js/jquery.min.js')}}"></script>
  <!-- Popper js -->
  <script src="{{asset('theme/farmie/js/popper.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="{{asset('theme/farmie/js/bootstrap.min.js')}}"></script>
  <!-- Owl Carousel js -->
  <script src="{{asset('theme/farmie/js/owl.carousel.min.js')}}"></script>
  <!-- Classynav -->
  <script src="{{asset('theme/farmie/js/classynav.js')}}"></script>
  <!-- Wow js -->
  <script src="{{asset('theme/farmie/js/wow.min.js')}}"></script>
  <!-- Sticky js -->
  <script src="{{asset('theme/farmie/js/jquery.sticky.js')}}"></script>
  <!-- Magnific Popup js -->
  <script src="{{asset('theme/farmie/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Scrollup js -->
  <script src="{{asset('theme/farmie/js/jquery.scrollup.min.js')}}"></script>
  <!-- Jarallax js -->
  <script src="{{asset('theme/farmie/js/jarallax.min.js')}}"></script>
  <!-- Jarallax Video js -->
  <script src="{{asset('theme/farmie/js/jarallax-video.min.js')}}"></script>
  <!-- Active js -->
  <script src="{{asset('theme/farmie/js/active.js')}}"></script>

@yield('custom-scripts')
</body>

</html>