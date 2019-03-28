 @extends('frontend.layouts.partials.index')
 @section('main-content')

 <!-- ##### Hero Area Start ##### -->
 <div class="hero-area">
    <div class="welcome-slides owl-carousel">

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(theme/farmie/img/bg-img/1.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInUp" data-delay="200ms">Nơi trao đổi giữa người mua và người bán</h2>
                <p data-animation="fadeInUp" data-delay="400ms">Người nông dân sẽ tạo tài khoản và bắt đầu đăng tin tức rao bán nông sản. Người thu mua có thể đăng tin mua nông sản và mua sản phẩm với mức giá mình đưa ra.
                </p>
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
                <h2 data-animation="fadeInDown" data-delay="200ms">Góp phần giải cứu nông sản</h2>
                <p data-animation="fadeInDown" data-delay="400ms">Người nông dân sẽ không cần quá lo lắng về nguồn cung cấp nông sản sau khi thu hoạch.
                  </p>
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- ##### Hero Area End ##### -->
  @include('frontend.layouts.partials.menu')
  @include('frontend.layouts.partials.listtin')
 
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

  
  <!-- ##### Contact Area Start ##### -->
  
  <!-- ##### Contact Area End ##### -->

  <!-- ##### News Area Start ##### -->
  
  <!-- ##### News Area End ##### -->

  @endsection