@extends('backend.layouts.index')

@section('title')
Tổng quan
@endsection

@section('custom-css')
@endsection

@section('main-content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif