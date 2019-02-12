@extends('backend.layouts.index')

@section('title')
Thêm mới mặt hàng nông sản
@endsection

@section('main-content')
<h3 align="center">THÊM NÔNG SẢN</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loại nông sản</label>
        <!-- <div class="col-md-5">
			@foreach ($danhsachloai as $loai)
            	<label class="fancy-radio">
					<input name="l_ma" id="l_ma" value="{{ $loai->l_ma }}" type="radio">
						<span><i></i>{{ $loai->l_ten }}</span>
				</label>
            @endforeach
		</div> -->
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên nông sản</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection