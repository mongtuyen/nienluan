@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh quyền
@endsection

@section('main-content')
<h3 align="center">HIỆU CHỈNH QUYỀN</h3>
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
<form method="post" action="{{ route('danhsachquyen.update', ['id' => $quyen->q_ma]) }}"> 
    <div class="box-body">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="q_ten">Tên</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" value="{{ $quyen->q_ten }}" placeholder="Nhập tên">
    </div>
    

    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
</div></div>
@endsection