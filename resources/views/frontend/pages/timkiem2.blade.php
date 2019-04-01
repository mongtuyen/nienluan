@extends('frontend.layouts.partials.index')
@section('title')
Danh sách tin mua
@endsection
@section('main-content')

<style>
.img-list1{
    width: 100px;
    height:100px;
}

.button3 {
	background-color: #f44336;
	border: none;
  color: white;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px 1px;
  
  opacity: 1;
  cursor: not-allowed;
} 
.button4 {
	background-color: #4CAF50;
	border: none;
  color: white;
  padding: 8px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px 1px;
 
  opacity: 1;
  cursor: not-allowed;
} 
</style>



<h4>DANH SÁCH </h4>
<!-- <a href="{{route('frontend.dangtinban')}}" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">Đăng tin</a>        -->

<h5 align="center"><b>Tìm kiếm: {{$tukhoa}}</b></h5>
<hr>


  <section class="news-area bg-white section-padding-70-0">
    <div class="container">
      <div class="row">
    
      <div class="col-12 col-lg-14 mb-100">
          
             
          
           @foreach($danhsachbaidang as $bd)



          <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            @if($bd->bd_hinh!=null)

            <div class="post-thumbnail">
              <img src="{{ asset('storage/photos/' . $bd->bd_hinh) }}"  class="img-list1" />
            </div> 
            @endif 
            <div class="post-content">              
              <a href="{{ route('frontend.details', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
              <p>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}<p>
              <p>Khối lượng: {{$bd->bd_khoiLuong}} kg 
                  @if($bd->bd_loai==2)
                  - Trạng thái sản phẩm: 
                    @if($bd->bd_trangThaisp==1)
                    <span class="label label-success">Đã thu hoạch</span>
                    @else
                    <span class="label label-warning">Chưa thu hoạch</span>
                    @endif
                  @endif
              </p>
              @if ($bd->status==2)
            Trạng thái tin :
						<button class="button3">Close</button>
						
						@endif
            </div>
          </div>
        
          @endforeach
    
        </div>

      </div>
    </div>
  </section>
  {{$danhsachbaidang->links()}}

  @endsection


  
 

