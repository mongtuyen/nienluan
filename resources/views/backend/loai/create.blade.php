@extends('backend.layouts.index')

@section('title')
Thêm mới loại nông sản
@endsection

@section('main-content')
<h3 align="center">THÊM LOẠI NÔNG SẢN</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-6">
<div class="box box-primary">
   

<form id="frmThemloai" method="post" action="{{route('danhsachloai.store')}}">
<div class="box-body">
{{csrf_field()}}
    <div class="form-group">
        <label for="l_ten">Tên loại</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" placeholder="Nhập tên loại">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form>
</div>
</div>
@endsection