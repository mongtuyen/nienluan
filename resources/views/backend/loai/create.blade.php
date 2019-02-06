@extends('backend.layouts.index')

@section('title')
Thêm mới loại nông sản
@endsection

@section('main-content')
<form id="frmThemloai" method="post" action="{{route('danhsachloai.store')}}">
{{csrf_field()}}
    <div class="form-group">
        <label for="l_ma">Mã loại</label>
        <input type="text" class="form-control" id="l_ma" name="l_ma" placeholder="Ma">
    </div>
    <div class="form-group">
        <label for="l_ten">Tên loại</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" placeholder="Ten">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>

</form>
@endsection