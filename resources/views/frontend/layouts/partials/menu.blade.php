<br><br><br><br>
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          
            <!-- Menu -->
            <div class="classy-menu">
              
              <!-- Navbar Start -->
              <div class="classynav">
                <ul>
                  <li class="active"><a href="#">Tất cả</a></li>
                @foreach($danhsachloai as $loai)
                 
                    <li><a href="#">{{ $loai->l_ten }}</a></li>
                    @if(count($loai->cacSanPham)>0)
                    <ul class="dropdown">
                        @foreach($loai->cacSanPham as $sanpham)
                            <li><a href="#">{{ $sanpham->sp_ten }}</a></li>
                        @endforeach
                    </ul>
                  @endif
                @endforeach
                </ul>
                
              </div>
              <!-- Navbar End -->
            </div>
          

          
        </div>
      </div>
   