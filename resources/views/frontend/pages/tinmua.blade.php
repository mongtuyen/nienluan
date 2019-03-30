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
</style>

 


 
        <section class="news-area section-padding-100-0news-area bg-gray section-padding-100-0"">
    <div class="container">
      <div class="row">
    

      <div class="col-12 col-lg-6">
    
          <h3>DANH SÁCH TIN MUA</h3>
          <!-- Single Blog Area -->
           @foreach($danhsachbaidang as $bd)
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
          
      </div>


    

      

      </div>
    </div>




    <!--Slidebar------------------------------------------------------------------------->
  </section>
  {{$danhsachbaidang->links()}}
        
  @endsection

 




  