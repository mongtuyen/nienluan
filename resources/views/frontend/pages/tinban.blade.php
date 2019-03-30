@extends('frontend.layouts.partials.index')
@section('title')
Danh sách tin bán
@endsection
@section('main-content')
     
<h4>DANH SÁCH TIN BÁN</h4>
<a href="{{route('frontend.dangtinban')}}" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">Đăng tin</a>       
<hr>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
  <section class="news-area bg-white section-padding-70-0">
    <div class="container">
      <div class="row">
    
      <div class="col-12 col-lg-14 mb-100">
          
             
          
           @foreach($danhsachbaidang as $bd)
           @if($bd->bd_loai=='2')



          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <div class="post-thumbnail">
              <img src="{{ asset('storage/photos/' . $bd->bd_hinh) }}"  class="img-list1" />
            </div>   
            <div class="post-content">              
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

      </div>
    </div>
  </section>
  {{$danhsachbaidang->links()}}
<style>
.img-list1{
    width: 100px;
    height:100px;
}
</style>

  @endsection


  