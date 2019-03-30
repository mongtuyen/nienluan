<footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer bg-img bg-overlay section-padding-80-0" style="background-image: url(theme/farmie/img/bg-img/futto.jpg);">
      <div class="container">
        <div class="row">

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <a href="{{route('frontend.home')}}" class="foo-logo d-block mb-30"><img src="{{asset('theme/farmie/img/core-img/logo1.png')}}" alt=""></a>
              <div class="contact-info">
                <p><i class="fa fa-map-pin" aria-hidden="true"></i><span>KTX khu A, Đại học Cần Thơ</span></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i><span>tuyenb1507187@student.ctu.edu.vn</span></p>
                <p><i class="fa fa-phone" aria-hidden="true"></i><span>0357661088</span></p>
              </div>
            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">Tìm kiếm nhanh</h5>
              <!-- Footer Widget Nav -->
              <nav class="footer-widget-nav">
                <ul>
                  <li><a href="#">Liên hệ</a></li>
                  <li><a href="#">Tin mua</a></li>
                  <li><a href="#">Tin bán</a></li>
                  
                </ul>
              </nav>
            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">Tin mới nhất</h5>

              <!-- Single Recent News Start -->
              @foreach($danhsachbaidangmoinhat as $new)
              <div class="single-recent-blog style-2 d-flex align-items-center">
                @if($new->bd_hinh!=null)
                <div class="post-thumbnail">
                  <img src="{{ asset('storage/photos/' . $new->bd_hinh) }}" alt="" >
                </div>
                @else
                <div class="post-thumbnail">
                  <img src="{{asset('theme/farmie/img/core-img/logo1.png')}}" alt="" >
                </div>
                @endif
                <div class="post-content">
                  <a href="{{ route('frontend.details', ['id' => $new->bd_ma]) }}" class="post-title">{{$new->bd_tieuDe}}</a>
                  <div class="post-date">{{$new->bd_ngayDang}}</div>
                </div>
              </div>
              @endforeach

            </div>
          </div>

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">Liên kết khác</h5>
              <!-- Footer Social Info -->
              <div class="footer-social-info">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  <span>Facebook</span>
                </a>
                <a href="#">
                  <i class="fa fa-google" aria-hidden="true"></i>
                  <span>Google +</span>
                </a>
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Copywrite Area  -->
    <div class="copywrite-area">
      <div class="container">
        <div class="copywrite-text">
          <div class="row align-items-center">
            <!-- <div class="col-md-6">
           
            <div class="col-md-6">
              <div class="footer-nav">
                <nav>
                  <ul>
                     <li><a href="#">About</a></li>
                    <li><a href="#">Produce</a></li>
                    <li><a href="#">Practice</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li> -->
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
