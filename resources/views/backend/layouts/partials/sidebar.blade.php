<aside class="main-sidebar">
  <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('theme/adminlte/img/avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Danh mục</li>

        <!-- <li class="treeview">
          <a href="{{ route('tongquan') }}"><i class="fa fa-dashboard"></i> <span>Tổng quan</span></a>
        </li> -->
        <li class="{{ Request::is('baocao.baidang*') ? 'active' : '' }}"><a href="{{ route('baocao.baidang') }}"><i class="fa fa-dashboard"></i>Tổng quan</a></li>
        
        <li class="treeview {{ Request::is('danhsachsanpham*') ? 'active menu-open' : '' }}">
          <a href="#"><i class="fa fa-edit"></i> <span>Quản lý nông sản</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: {{ Request::is('danhsachsanpham*') ? 'block' : '' }};">
            <li class="{{ Request::is('danhsachloai') ? 'active' : '' }}"><a href="{{ route('danhsachloai.index') }}"><i class="fa fa-circle-o"></i>Loại nông sản</a></li>
            <li class="{{ Request::is('danhsachsanpham') ? 'active' : '' }}"><a href="{{ route('danhsachsanpham.index') }}"><i class="fa fa-circle-o"></i>Nông sản</a></li>
          </ul>
        </li>


        <li class="treeview {{ Request::is('danhsachnguoidung*') ? 'active menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-user"></i> <span>Quản lý người dùng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: {{ Request::is('danhsachnguoidung*') ? 'block' : 'none' }};">
            <li class="{{ Request::is('danhsachquyen') ? 'active' : '' }}"><a href="{{route('danhsachquyen.index')}}"><i class="fa fa-circle-o"></i> Quyền</a></li>
            <li class="{{ Request::is('danhsachnguoidung') ? 'active' : '' }}"><a href="{{route('danhsachnguoidung.index')}}"><i class="fa fa-circle-o"></i> Người dùng</a></li>
          </ul>
        </li>
        
       
        <!-- <li class="active"><a href="{{route('danhsachloai.index')}}"><span>Loại nông sản<span></a></li>
        
        <li class="active"><a href="{{route('danhsachsanpham.index')}}">Nông sản</a></li> -->
        <li class="{{ Request::is('danhsachbaidang*') ? 'active' : '' }}"><a href="{{ route('danhsachbaidang.index') }}"><i class="fa fa-tasks"></i>Quản lý bài đăng</a></li>
         
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
