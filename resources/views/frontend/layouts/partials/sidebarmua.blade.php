<div class="col-12 col-md-4">
  <div class="sidebar-area">
    <br>
   
    <div class="single-widget-area">
      <form action="usertimkiemloai" method="post" class="search-widget-form" role="search">
        <input type="hidden" name="_token" value="{{csrf_token()}}";>
        <input type="search" name="tukhoa" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit"><i class="icon_search" aria-hidden="true"></i></button>
      </form>
    </div>
  
<div class="logo ">
    <div class="single-widget-area">
      <a href="{{route('frontend.tinmua') }}"><h5  class="widget-title">Tất cả</h5></a>
        @foreach($danhsachloai as $loai)
          <br>
          <h5 class="widget-title">{{ $loai->l_ten }}</h5>
              <!-- Cata List -->
          @if(count($loai->cacSanPham)>0)
            <ul class="cata-list">
              @foreach($loai->cacSanPham as $sanpham)             
                <li><a href="{{route('frontend.loctinmua', ['id' => $sanpham->sp_ma]) }}">{{ $sanpham->sp_ten }}</a></li>
              @endforeach
              </ul>
              @endif
        @endforeach
    </div>

            <!-- Single Widget Area -->
            <div class="single-widget-area">
            
              <!-- Title -->
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
                @if($new->bd_loai==2)
                    <div class="post-content">
                      <a href="{{ route('frontend.details', ['id' => $new->bd_ma]) }}" class="post-title">{{$new->bd_tieuDe}}</a>
                      <div class="post-date">{{$new->bd_ngayDang}}</div>
                    </div>
                  @else
                  <div class="post-content">
                      <a href="{{ route('frontend.muadetails', ['id' => $new->bd_ma]) }}" class="post-title">{{$new->bd_tieuDe}}</a>
                      <div class="post-date">{{$new->bd_ngayDang}}</div>
                    </div>
                  @endif
              </div>
              @endforeach
              
            </div>
  </div>
  </div>


</div>

        
