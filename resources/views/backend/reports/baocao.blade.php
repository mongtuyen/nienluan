@extends('backend.layouts.index')
@section('title')
Báo cáo 
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
<form method="get" action="#" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="tuNgay">Từ ngày</label>
        <input type="date" class="form-control" id="tuNgay" name="tuNgay">
    </div>
    <div class="form-group">
        <label for="denNgay">Đến ngày</label>
        <input type="date" class="form-control" id="denNgay" name="denNgay">
    </div>
    <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo theo ngày</button>
    
    <!-- <button type="submit" class="btn btn-primary" id="btnLapBaoCaons">Lập báo cáo theo nông sản</button>
     -->
</form>
<canvas id="chartOfobjChart" width="400" height="400"></canvas>
@endsection
@section('custom-scripts')
<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('theme/adminlte/bower_components/chart.js/Chart.js') }}"></script>
<script>
    $(document).ready(function () {
        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
        $("#btnLapBaoCao").click(function(e) { 
            e.preventDefault();
            $.ajax({
                url: '{{ route('baocao.baidangdata') }}',
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function (response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function () {
                        myLabels.push((this.thoiGian));
                        myData.push(this.tongbaidang);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }
                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "horizontalBar",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },
                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                                
                            },
                            title: {
                                display: true,
                                text: "Tổng bài đăng theo ngày"
                            },
                            responsive: true
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
        $("#btnLapBaoCaons").click(function(e) { 
            e.preventDefault();
            $.ajax({
                url: '{{ route('baocao.sanphamdata') }}',
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function (response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function () {
                        myLabels.push((this.sanpham));
                        myData.push(this.tongbaidang);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }
                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "horizontalBar",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },
                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                                
                            },
                            title: {
                                display: true,
                                text: "Tổng bài đăng theo loại nông sản"
                            },
                            responsive: true
                        }
                    });
                }
            });
        });
    });
</script>
@endsection