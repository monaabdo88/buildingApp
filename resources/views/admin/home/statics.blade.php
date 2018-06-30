@extends('admin.layouts.layout')
@section('title')
إحصائيات العقارات عن سنه
{{ $year }}
@endsection
@section('header')
    {!! Html::style('cus/css/select2.min.css') !!}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            إحصائيات العقارات عن سنه
            {{ $year }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">إحصائيات العقارات عن سنه
                {{ $year }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">إحصائيات العقارات</h3>
                        {!! Form::open(['url'=>'/adminPanel/buYear/statics','method'=>'POST']) !!}
                        <select class="selectYear">
                            @for($i = 2010 ; $i <= $year; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <input type="submit" name="submit" value="إظهار الإحصائيات" class="btn btn-success">
                        {!! Form::close() !!}

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>إحصائيات العقارات عن سنه
                                        {{ $year }}</strong>
                                </p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="chart">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="salesChart" style="height: 180px;"></canvas>
                                        </div><!-- /.chart-responsive -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $(".selectYear").select2({
            dir:"rtl",
            width:"100px"
        });
            /* ChartJS
          * -------
          * Here we will create a few charts using ChartJS
          */

            //-----------------------
            //- MONTHLY SALES CHART -
            //-----------------------

            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas);

            var salesChartData = {
                labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"],
                datasets: [
                    {
                        label: "Digital Goods",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [
                            @foreach($bu_created as $create)
                            {{$create->counting}},
                            @endforeach
                        ]
                    }
                ]
            };
            var salesChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: false,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                maintainAspectRatio: true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true
            };
            salesChart.Line(salesChartData, salesChartOptions);
    </script>
@endsection