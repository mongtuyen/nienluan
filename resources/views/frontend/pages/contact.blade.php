<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  
  <!-- Favicon -->
  <link rel="icon" href="{{asset('theme/farmie/img/core-img/favicon.ico') }}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet"  href="{{ asset('theme/farmie/style.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('theme/farmie/css/custom-styles.css') }}">
  <script type="text/javascript" language="javascript" src="{{asset('theme/adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
 
</head>

<body>
@include('frontend.layouts.partials.header')
  <!-- ##### Contact Information Area Start ##### -->
  <section class="contact-info-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
          
            <h2>Thông tin liên hệ</h2>
            <img src="img/core-img/decor2.png" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
            <div class="contact-icon">
              <i class="icon_pin_alt"></i>
            </div>
            <h5>Địa chỉ</h5>
            <h6>KTX khu A, Đại học Cần Thơ</h6>
          </div>
        </div>

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
            <div class="contact-icon">
              <i class="icon_phone"></i>
            </div>
            <h5>Điện thoại</h5>
            <h6>0357661088</h6>
          </div>
        </div>

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
            <div class="contact-icon">
              <i class="icon_mail_alt"></i>
            </div>
            <h5>Email</h5>
            <h6>tuyenb1507187@student.ctu.edu.vn</h6>
          </div>
        </div>

      </div>
      <div class="c-border"></div>
    </div>
  </section>
  <!-- ##### Contact Information Area End ##### -->

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
              <img src="img/core-img/decor.png" alt="">
            </div>
            <!-- Contact Form Area -->
            <div class="contact-form-area">
              <form action="#" method="post">
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
          

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7950818341174!2d105.7677647142822!3d10.033761875206283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881792eeb09b%3A0x44438ff5102c4bd6!2zS8O9IHTDumMgeMOhIEtodSBB!5e0!3m2!1svi!2s!4v1553767048912" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-area">
    <!-- Main Footer Area -->
    

    <!-- Copywrite Area  -->
    <div class="copywrite-area">
      <div class="container">
        <div class="copywrite-text">
          <div class="row align-items-center">
            <div class="col-md-6">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Mong Tuyen</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
            </div>
            <div class="col-md-6">
              <div class="footer-nav">
                <nav>
                  <ul>
                    
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  </section>
  <!-- ##### Contact Area End ##### -->
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
</body>

</html>