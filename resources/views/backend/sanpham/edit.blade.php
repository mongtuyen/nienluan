@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh thông tin người dùng
@endsection

@section('main-content')
<h3 align="center">HIỆU CHỈNH NÔNG SẢN</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div  class="col-md-6">
<div  class="box box-primary">
  
<form method="post" action="{{ route('danhsachsanpham.update', ['id' => $sanpham->sp_ma]) }}" > 
    <div class="box-body">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loại nông sản</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if($loai->l_ma == $sanpham->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên nông sản</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten', $sanpham->sp_ten) }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form>
</div></div>
@endsection