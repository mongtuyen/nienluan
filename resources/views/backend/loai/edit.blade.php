@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh loại
@endsection

@section('main-content')
<h3 align="center">HIỆU CHỈNH LOẠI NÔNG SẢN</h3>
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
  
<form method="post" action="{{ route('danhsachloai.update', ['id' => $loai->l_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Tên</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ $loai->l_ten }}" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form></div></div>
@endsection