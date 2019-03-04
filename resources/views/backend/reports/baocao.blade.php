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
<div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
        </div>
            <!-- /.info-box-content -->
</div>

<div class="col-md-8">
    <p class="text-center">
        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
    </p>

    <div class="chart">
                    <!-- Sales Chart Canvas -->
        <canvas id="salesChart" style="height: 121px; width: 473px;" width="473" height="121"></canvas>
    </div>
                  <!-- /.chart-responsive -->
</div>
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
                url: '{{ route('tongquan') }}',
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
                        myData.push(this.tongThanhTien);
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
                                text: "Báo cáo đơn hàng"
                            },
                            responsive: true
                        }
                    });
                }
            });
        });
    });
</script>



