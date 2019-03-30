@extends('frontend.layouts.partials.index')
@section('title')
Danh sách tin mua
@endsection
@section('main-content')

<style>
.img-list2{
    width: 100px;
    height:100px;
}
.vl {
  border-left: 1px solid green;
  height: 1500px;
  position: absolute;
  left: 102%;
  margin-left: -7px;
  top: 0;
}
</style>

 

 <!-- ---------------------------------------------- -->
        <section class="news-area section-padding-100-0">
    <div class="container">
      <div class="row">
    

      <div class="col-12 col-lg-6">
    
      <h4>DANH SÁCH TIN MUA</h4>
      <hr>
          <!-- Single Blog Area -->
           @foreach($allbd as $bd)
           @if($bd->bd_loai=='1')
            <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <!-- Post Content -->          
              <div class="post-content">
                <a href="{{ route('frontend.muadetails', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
                <p>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}</p>
                <p>Khối lượng: {{$bd->bd_khoiLuong}} kg</p>
              </div>
            </div>
          @endif
          @endforeach
          <div class="vl"></div>
      </div>


    

       <div class="col-12 col-lg-6 mb-100">
       <h4>DANH SÁCH TIN BÁN</h4>
          <hr>
          <!-- Single Blog Area -->
           @foreach($allbd as $bd)
           @if($bd->bd_loai=='2')
            <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <!-- Post Content -->          
            <div class="post-content">
            <img src="{{ asset('storage/photos/' . $bd->bd_hinh) }}" class="img-list2" />
              
              <a href="{{ route('frontend.details', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
              <p>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}<p>
              <p>Khối lượng: {{$bd->bd_khoiLuong}} kg - Trạng thái sản phẩm: 
                  
                    @if($bd->bd_trangThaisp==1)
                    <span class="label label-success">Đã thu hoạch</span>
                  
                    @else
                    <span class="label label-warning">Chưa thu hoạch</span>
                    
                    @endif
                  
              </p>

            </div>
          </div>
          @endif
          @endforeach
         
        </div>
 {{$allbd->links()}}
      </div>
    </div>
  </section>
  


  @endsection