@extends('backend.layouts.index')

@section('title')
Danh sách loại
@endsection


@section('main-content')
<h3 align="center">DANH SÁCH LOẠI NÔNG SẢN</h3>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachloai.create') }}" class="btn btn-primary">Thêm</a>

    


<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Thêm
</button> -->

<div class="box">
	<table class="table table-bordered">
		<thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Tùy chọn</th>   
             
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten }}</td>
                <!-- <td>
                <button class="btn btn-primary pull-left" data-l_ma="{{$loai->l_ma}}" data-l_ten="{{$loai->l_ten}}"
                 data-toggle="modal" data-target="#edit">Sửa</button>
                 <button class="btn btn-danger" data-l_ma="{{$loai->l_ma}}" data-toggle="modal" data-target="#delete">Xóa</button> 
                -->
                <td>
                <a href="{{ route('danhsachloai.edit', ['id' => $loai->l_ma]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->l_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}  
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
					      </form></td>
                    
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Xóa</button> 
                        
                        <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Cảnh báo</h4>
                              </div>

                              <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa?</p>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-outline">Có, hãy xóa</button>
 </div>
                            </div>
         
                          </div>
         
                        </div>


                </form> 
                </td> -->
            </tr>
        @endforeach
    </tbody>
</table>
</div>


<!-- 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm loại</h4>
      </div>
      <form action="{{route('danhsachloai.store')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('backend.loai.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>




<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="{{route('danhsachloai.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="l_ten" id="l_ma" value="">
			    	@include('backend.loai.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('danhsachloai.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="l_ma" id="l_ma" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-outline">Yes, Delete</button>
	      </div>
      </form>
    </div> 
  </div>-->

{{$danhsachloai->links()}}
@endsection