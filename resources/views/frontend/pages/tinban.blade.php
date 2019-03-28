 @extends('frontend.layouts.partials.index')
 @section('main-content')

 
  @include('frontend.layouts.partials.menu')
  <section class="news-area bg-gray section-padding-100-0">
    <div class="container">
      <div class="row">
    
      <div class="col-12 col-lg-6 mb-100">
          <h3>Danh sách tin bán</h3>
          
          <!-- Single Blog Area -->
           @foreach($danhsachbaidang as $bd)
           @if($bd->bd_loai=='2')
            <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <!-- Post Content -->          
            <div class="post-content">
            <img src="{{ asset('storage/photos/' . $bd->bd_hinh) }}" width="100px" height="100px" />
              
              <a href="{{ route('frontend.details', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
              <p>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}<p>
              <p>Khối lượng: {{$bd->bd_khoiLuong}} kg - Trạng thái sản phẩm: 
                  @if( $bd->bd_loai==2)
                    @if($bd->bd_trangThaisp==1)
                    <span class="label label-success">Đã thu hoạch</span>
                  
                    @else
                    <span class="label label-warning">Chưa thu hoạch</span>
                    
                    @endif
                  @endif
                  
                  @if($bd->bd_loai==1)
                    <span> </span>
                  @endif
              </p>

            </div>
          </div>
          @endif
          @endforeach
    
        </div>

      </div>
    </div>
  </section>
  

  @endsection