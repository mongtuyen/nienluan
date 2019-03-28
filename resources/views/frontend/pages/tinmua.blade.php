 @extends('frontend.layouts.partials.index')
 @section('main-content')

 @include('frontend.layouts.partials.menu')
 <section class="news-area bg-gray section-padding-100-0">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 mb-100">

          <!-- Single Blog Area -->
           @foreach($danhsachbaidang as $bd)
            <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <!-- Post Content -->          
            <div class="post-content">
            <h6>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}</h6>
              <a href="{{ route('frontend.muadetails', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
              <p>Khối lượng: {{$bd->bd_khoiLuong}}</p>

            </div>
          </div>
          @endforeach
    
        </div>


      </div>
    </div>
  </section>
 
 
  
  @endsection