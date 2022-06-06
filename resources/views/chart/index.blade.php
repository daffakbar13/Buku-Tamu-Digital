@extends('template.main2')

@section('title', 'Chart')

@section('otherScript')

<script>
    $(function() {
        var totalrevenue = 124212;

        var revenueColumnChart = new CanvasJS.Chart("revenue-column-chart", {
            animationEnabled: true,
            backgroundColor: "transparent",
            theme: "theme1",
            axisX: {
                labelFontSize: 14,
                valueFormatString: "MMM YYYY"
            },
            axisY: {
                labelFontSize: 14,
                prefix: ""
            },
            toolTip: {
                borderThickness: 3,
                cornerRadius: 15
            },
            data: [{
                type: "column",
                yValueFormatString: "###,###.##",
                dataPoints: [{
                        x: new Date("1 Jan {{$tahun}}"),
                        y: <?= $januari; ?>
                    },
                    {
                        x: new Date("1 Feb {{$tahun}}"),
                        y: <?= $februari; ?>
                    },
                    {
                        x: new Date("1 Mar {{$tahun}}"),
                        y: <?= $maret; ?>
                    },
                    {
                        x: new Date("1 Apr {{$tahun}}"),
                        y: <?= $april; ?>
                    },
                    {
                        x: new Date("1 May {{$tahun}}"),
                        y: <?= $mei; ?>
                    },
                    {
                        x: new Date("1 Jun {{$tahun}}"),
                        y: <?= $juni; ?>
                    },
                    {
                        x: new Date("1 Jul {{$tahun}}"),
                        y: <?= $juli; ?>
                    },
                    {
                        x: new Date("1 Aug {{$tahun}}"),
                        y: <?= $agustus; ?>
                    },
                    {
                        x: new Date("1 Sep {{$tahun}}"),
                        y: <?= $september; ?>
                    },
                    {
                        x: new Date("1 Oct {{$tahun}}"),
                        y: <?= $oktober; ?>
                    },
                    {
                        x: new Date("1 Nov {{$tahun}}"),
                        y: <?= $november; ?>
                    },
                    {
                        x: new Date("1 Dec {{$tahun}}"),
                        y: <?= $desember; ?>
                    }
                ]
            }]
        });

        revenueColumnChart.render();

        //CanvasJS pie chart to show product wise annual revenue for 2015
        var productsRevenuePieChart = new CanvasJS.Chart("products-revenue-pie-chart", {
            animationEnabled: true,
            theme: "theme1",
            legend: {
                fontSize: 14
            },
            toolTip: {
                borderThickness: 3,
                content: "<span style='\"'color: {color};'\"'>{name}</span>: {y} (#percent%)",
                cornerRadius: 15
            },
            data: [{
                indexLabelFontColor: "#676464",
                indexLabelFontSize: 14,
                legendMarkerType: "circle",
                legendText: "{indexLabel}",
                showInLegend: true,
                startAngle: 90,
                type: "pie",
                dataPoints: [{
                        y: <?= $keperluanLainnya; ?>,
                        name: "Keperluan Lainnya",
                        indexLabel: "Keperluan Lainnya",
                        legendText: "Keperluan Lainnya",
                        color: "#5914b2",
                        exploded: true
                    },
                    <?php
                    for ($i = 0; $i < count($master_keperluan); $i++) {
                    ?> {
                            y: <?= $keperluan[$i]; ?>,
                            name: "<?= $master_keperluan[$i]->nama_keperluan; ?>",
                            indexLabel: "<?= $master_keperluan[$i]->nama_keperluan; ?>",
                            legendText: "<?= $master_keperluan[$i]->nama_keperluan; ?>",
                            exploded: true
                        },
                    <?php
                    }
                    ?>
                ]
            }]
        });

        productsRevenuePieChart.render();

        //CanvasJS spline chart to show orders from Jan 2015 to Dec 2015
        var ordersSplineChart = new CanvasJS.Chart("orders-spline-chart", {
            animationEnabled: true,
            backgroundColor: "transparent",
            theme: "theme1",
            toolTip: {
                borderThickness: 3,
                cornerRadius: 15
            },
            axisX: {
                labelFontSize: 14,
                maximum: new Date("31 Dec {{$tahun}}"),
                valueFormatString: "MMM YYYY"
            },
            axisY: {
                gridThickness: 0.5,
                labelFontSize: 14,
                lineThickness: 1
            },
            data: [{
                type: "spline",
                dataPoints: [{
                        x: new Date("1 Jan {{$tahun}}"),
                        y: <?= $januari; ?>
                    },
                    {
                        x: new Date("1 Feb {{$tahun}}"),
                        y: <?= $februari; ?>
                    },
                    {
                        x: new Date("1 Mar {{$tahun}}"),
                        y: <?= $maret; ?>
                    },
                    {
                        x: new Date("1 Apr {{$tahun}}"),
                        y: <?= $april; ?>
                    },
                    {
                        x: new Date("1 May {{$tahun}}"),
                        y: <?= $mei; ?>
                    },
                    {
                        x: new Date("1 Jun {{$tahun}}"),
                        y: <?= $juni; ?>
                    },
                    {
                        x: new Date("1 Jul {{$tahun}}"),
                        y: <?= $juli; ?>
                    },
                    {
                        x: new Date("1 Aug {{$tahun}}"),
                        y: <?= $agustus; ?>
                    },
                    {
                        x: new Date("1 Sep {{$tahun}}"),
                        y: <?= $september; ?>
                    },
                    {
                        x: new Date("1 Oct {{$tahun}}"),
                        y: <?= $oktober; ?>
                    },
                    {
                        x: new Date("1 Nov {{$tahun}}"),
                        y: <?= $november; ?>
                    },
                    {
                        x: new Date("1 Dec {{$tahun}}"),
                        y: <?= $desember; ?>
                    }
                ]
            }]
        });

        ordersSplineChart.render();

    });
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- datepicker bootstrap -->
<link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker.min.css') }}">
<script src="{{ asset('datePicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script>
    $(function() {
        $("#date").datepicker({
            format: "yyyy",
            startView: 2,
            minViewMode: 2,
            maxViewMode: 2,
            language: "id"
        });
    });
</script>

@endsection

@section('content')

<div class="" style="height: 80px; position: fixed; top: 15px;left: 20px;">
    <div class="material-design-btn">
        <a href="{{url('')}}">
            <button class="btn btn-danger waves-effect"><i class="notika-icon notika-left-arrow"></i> Back</button>
        </a>
    </div>
</div>

<div class="container">
    <div class="row" style="text-align:center;">
        @extends('template.header2')
    </div>
    <div class="row">

        <h2 id="header">
            <strong>{{$judul}}</strong>
            <small class="text-muted">Jan {{$tahun}} - Dec {{$tahun}}</small>
            <div class="" style="float: right;">
                <form method="POST" action="{{ url('chart') }}">
                    @csrf
                    <div class="form-group">
                        <small class="text-muted" style="float: left;">Year :</small>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="date" name="date">
                        </div>
                        <button class="btn btn-success">Cek</button>
                    </div>
                </form>
            </div>
        </h2>
    </div>


    <div class="row m-b-1">
        <div class="col-xs-12">
            <div class="card shadow">
                <h4 class="card-header">Tamu - {{$semua}} (<span class="text-muted">Grafik Batang</span>)</h4>
                <div class="card-block">
                    <div id="revenue-column-chart"></div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row m-b-1">
        @if($grafik == "bukuTamu")
        <div class="col-lg-6">
            <div class="card shadow">
                <h4 class="card-header">Keperluan (<span class="text-muted">Grafik Lingkaran</span>)</h4>
                <div class="card-block">
                    <div id="products-revenue-pie-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow">
                <h4 class="card-header">Tamu - {{$semua}} (<span class="text-muted">Grafik Garis</span>)</h4>

                <div class="card-block">
                    <div id="orders-spline-chart"></div>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-6" style="display: none;">
            <div class="card shadow">
                <h4 class="card-header">Keperluan (<span class="text-muted">Grafik Lingkaran</span>)</h4>
                <div class="card-block">
                    <div id="products-revenue-pie-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="card shadow">
                <h4 class="card-header">Tamu - {{$semua}} (<span class="text-muted">Grafik Garis</span>)</h4>

                <div class="card-block">
                    <div id="orders-spline-chart"></div>
                </div>
            </div>
        </div>
        @endif
    </div> <!-- row -->
</div>

<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">


@endsection

@section('otherScript2')

@endsection