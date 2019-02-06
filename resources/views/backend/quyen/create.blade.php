@extends('backend.layouts.index')

@section('title')
Thêm mới quyền
@endsection

@section('main-content')
<form id="frmThemQ" method="post" action="{{route('danhsachquyen.store')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="q_ma">Mã</label>
        <input type="text" class="form-control" id="q_ma" name="q_ma" placeholder="Nhập mã">
    </div>
    <div class="form-group">
        <label for="q_ten">Tên</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection