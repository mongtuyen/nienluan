@extends('frontend.layouts.partials.indexmua')
@section('title')
Danh sách tin mua
@endsection
@section('main-content')


<style>
.img-list2{
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


<h4>DANH SÁCH TIN MUA</h4>
<a href="{{route('frontend.dangtinmua')}}" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">Đăng tin</a>        

<hr>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
 
        <section class="news-area section-padding-100-0news-area bg-white section-padding-75-0">
    <div class="container">
      <div class="row">
    

      <div class="col-12 col-lg-14 mb-100">
    
               
          <!-- Single Blog Area -->
           @foreach($danhsachbaidang as $bd)
           @if($bd->bd_loai=='1')
            <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <!-- Post Content -->          
              <div class="post-content">
                <a href="{{ route('frontend.muadetails', ['id' => $bd->bd_ma]) }}" class="post-title">{{$bd->bd_tieuDe}}</a>
                <p>Ngày đăng: {{$bd->bd_ngayDang}}/{{$bd->nguoidung->nd_name}}</p>
                <p>Khối lượng: {{$bd->bd_khoiLuong}} kg</p>
                <p>
						
						
						@if ($bd->status==2)
            Trạng thái tin:
						<button class="button3">Close</button>
						
						@endif
						
					</p>
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

 




  