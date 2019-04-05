
@extends('frontend.layouts.partials.index1')
@section('title')
Chi tiết tin bán
@endsection
 @section('main-content')
 <html>
 <head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('theme/details/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/details/css/main.css')}}">
<!--===============================================================================================-->
<style>
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
</head>
<body>
<div class="container">
	<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
		<button class="how-pos3 hov3 trans-04 js-hide-modal" data-sp-ma="{{ $baidang->bd_ma }}">
			<!-- <img src="{{ asset('theme/cozastore/images/icons/icon-close.png') }}" alt="CLOSE"> -->
		</button>

		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="{{ asset('storage/photos/'. $baidang->bd_hinh) }}">
								<div class="wrap-pic-w pos-relative">
									<img src="{{ asset('storage/photos/' . $baidang->bd_hinh) }}" alt="IMG-PRODUCT"  class="img-list">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' .  $baidang->bd_hinh) }}"  class="img-list">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>

						
							@foreach($hinhanhlienquan as $hinhanh)
							<div class="item-slick3" data-thumb="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}">
								<div class="wrap-pic-w pos-relative">
									<img src="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}" alt="IMG-PRODUCT"  class="img-list">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}"  class="img-list">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<!-- <h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<a href="{{ route('frontend.details', ['id' => $baidang->bd_ma]) }}" class="post-title">{{ $baidang->bd_tieuDe }}</a>
					</h4> -->
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
					{{ $baidang->bd_tieuDe }}
						</h4>
					<span class="mtext-106 cl2">
						Giá: {{ $baidang->bd_gia }} VND/KG
					</span>
					<p class="stext-102 cl3 p-t-23">
						Khối lượng: {{ $baidang->bd_khoiLuong }} kg
					</p>
					
					<p class="stext-102 cl3 p-t-23">
						Ngày đăng: {{$baidang->bd_ngayDang}}
					</p>
					<p class="stext-102 cl3 p-t-23">
						Ngày kết thúc: {{$baidang->bd_ngayHetHan}}
						
					</p>
					<p class="stext-102 cl3 p-t-23">
						
						Địa chỉ :{{$baidang->nguoidung->nd_diaChi}} (chi tiết trên bản đồ)
					</p>
					<p class="stext-102 cl3 p-t-23">
					Trạng thái sản phẩm: 
                  @if( $baidang->bd_loai==2)
                    @if($baidang->bd_trangThaisp==1)
                    <span class="label label-success">Đã thu hoạch</span>
                  
                    @else
                    <span class="label label-warning">Chưa thu hoạch</span>
                    
                    @endif
                  @endif
                  
                  @if($baidang->bd_loai==1)
                    <span> </span>
                  @endif
					</p>
					<p>
						
						Trạng thái tin :
						@if ($baidang->status==2)
						<button class="button3">Close</button>
						@else
						<button class="button4">Open</button>
						@endif
						
					</p>
				</div>
			</div>


		</div>



		<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab" aria-expanded="true">Chi tiết</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab" aria-expanded="false">Thông tin người bán</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab" aria-expanded="false">Giao dịch</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade active show" id="description" role="tabpanel" aria-expanded="true">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{!!$baidang->bd_noiDung!!}</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel" aria-expanded="false">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									
										
									<ul class="p-lr-28 p-lr-15-sm">
								
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Họ tên 
											</span>

											<span class="stext-102 cl6 size-206">
												{{$nguoidung->nd_name}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Địa chỉ
											</span>

											<span class="stext-102 cl6 size-206">
												{{$nguoidung->nd_diaChi}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Số điện thoại
											</span>

											<span class="stext-102 cl6 size-206">
											{{$nguoidung->nd_dienThoai}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Email
											</span>

											<span class="stext-102 cl6 size-206">
											{{$nguoidung->nd_email}}
											</span>
										</li>
										<div class="col-lg-15">
										@if($nguoidung->nd_diaChi=='Đồng Tháp')
          					<div class="contact-maps mb-100">
          
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.298423744852!2d105.80250491428448!3d10.397855868911481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a887400000001%3A0x647b876d22ff62e9!2zS2h1IERpIFTDrWNoIFjhurtvIFF1w710!5e0!3m2!1svi!2s!4v1553767340382" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        						</div>
										@endif

										@if($nguoidung->nd_diaChi=='Vĩnh Long')
          					<div class="contact-maps mb-100">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.5997505699343!2d105.99872531428231!3d10.04984897493264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a07026bf87db75%3A0xd5f7e94bd1d880d0!2zQ2jhu6MgVGFtIELDrG5o!5e0!3m2!1svi!2s!4v1553767635301" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
										</div>
										@endif
										<!-- <a href="#" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms" style="animation-delay: 600ms; opacity: 1;">Liên hệ</a>
								 -->
									</ul>
									
								</div>
							</div>
						</div>

						<!-- - -->
						
						<div class="tab-pane fade" id="reviews" role="tabpanel" aria-expanded="false">
						

							<div class="row">
								<div class="col-sm-5 col-md-8 col-lg-8 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<!-- @foreach($baidang->gia as $gd)
										<div class="flex-w flex-t p-b-68">
											
									
											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
													{{ $gd->nguoidung->nd_name}}
													<small>{{$gd->dg_time}}</small>
													</span>

													
												</div>

												<p class="stext-102 cl6">
												{{$gd->dg_noiDung}}
												</p>
												<p class="stext-102 cl6">
												{{$gd->dg_khoiLuong}}
												</p>
											</div>
										</div>
										@endforeach -->
										<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
										<div class="box">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Người đăng</th>
            <th>Thời điểm</th>  
						<th>Giá (vnđ/kg)</th>  
						<th>Khối lượng (kg)</th>  						          
            <th>Trạng thái</th>
            
        </tr>
    </thead>
    <tbody>
		@foreach($baidang->gia as $i=> $gd)
            <tr>
                <td>{{ $i+1 }}</td>
               
                <td>{{$gd->nguoidung->nd_name}}</td>
                <td>{{$gd->dg_time}}</td>  
                <td>{{$gd->dg_noiDung}}</td>
                <td>{{$gd->dg_khoiLuong}}</td>
                 
                <td>
                    @if($gd->dg_trangThai==1)
                    {{'Đang chờ'}}
                    @else
                    {{'Được chọn'}}
                    @endif
                </td>
               
            </tr>
        @endforeach
    </tbody>
</table>
</div>

										@if(Auth::check())
											@if(Auth::user()->nd_ma!=$baidang->nd_ma && $baidang->status!=2 && Auth::user()->quyen->q_ma!=3)
										<!-- Add review --comment/{{$baidang->bd_ma}}-->
									<br>
										<form action="{{route('nhapgia', ['id' => $baidang->bd_ma])}}" method="post" class="w-full">
											
											{{ csrf_field() }}
											<h5 align="center" class="mtext-108 cl2 p-b-7">
												Nhập thông tin đấu giá 
											</h5>
										
											<div class="box-body">
											<div class="form-group">
        <label for="dg_noiDung">Giá (vnđ/kg)</label>
        <input type="text" class="form-control" id="dg_noiDung" name="dg_noiDung" value="{{ old('dg_noiDung') }}" required>
    </div>
		<div class="form-group">
        <label for="dg_khoiLuong">Khối lượng (kg)</label>
        <input type="text" class="form-control" id="dg_khoiLuong" name="dg_khoiLuong" value="{{ old('dg_khoiLuong') }}" required>
    </div>

											<button type="submit" class="btn famie-btn mt-4">
												Gửi
											</button>
											</div>
										</form>
									
											@endif
										@else
										<h5 class="mtext-108 cl2 p-b-7">
												Vui lòng đăng nhập để đấu giá 
											</h5>
										@endif
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	</div>
</div>
<script src="{{ asset('theme/details/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('theme/details/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ asset('theme/details/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/slick/slick.min.js')}}"></script>
	<script src="{{ asset('theme/details/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/details/js/main.js')}}"></script>


	</body>
</html>
@endsection

