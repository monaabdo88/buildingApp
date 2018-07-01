@extends('admin.layouts.layout')
@section('title')
    رئيسية لوحة التحكم
    @endsection
@section('content')
    <section class="content-header">
        <h1>رئيسية لوحة التحكم</h1>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">عدد الأعضاء</span>
                        <span class="info-box-number">{{$usersCount}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-building-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">العقارات الغير مفعلة</span>
                        <span class="info-box-number">{{$bu_count_unactive}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">العقار المفعلة</span>
                        <span class="info-box-number">{{$bu_count_active}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">رسائل الموقع</span>
                        <span class="info-box-number">{{$contactCount}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">تقارير العقارات المضافة</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>رسم بياني يوضح العقارات المضافة خلال السنه</strong>
                                </p>
                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div><!-- /.chart-responsive -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- ./box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">أماكن العقارات</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <div class="pad">
                                    <!-- Map will be created here -->
                                    <div id="world-map-markers" style="height: 325px;"></div>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4">
                                <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                    <div class="description-block margin-bottom">
                                        <h5 class="description-header">{{$bu_count_active}}</h5>
                                        <span class="description-text">المفعل</span>
                                    </div><!-- /.description-block -->
                                    <div class="description-block margin-bottom">
                                        <h5 class="description-header">{{$bu_count_unactive}}</h5>
                                        <span class="description-text">الغير مفعل</span>
                                    </div><!-- /.description-block -->
                                    <div class="description-block">
                                        <h5 class="description-header">{{$bu_count_active + $bu_count_unactive}}</h5>
                                        <span class="description-text">كل العقارات</span>
                                    </div><!-- /.description-block -->
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="row">
                    <div class="col-md-6">    <!-- TABLE: LATEST ORDERS -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">أحدث الرسائل</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>أسم المرسل</th>
                                            <th>حالة الرسالة</th>
                                            <th>نوع الرسالة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lastMsg as $last)
                                        <tr>
                                            <td><a href="{{url('/adminPanel/contact/'.$last->id.'/edit')}}">{{$last->id}}</a></td>
                                            <td><a href="{{url('/adminPanel/contact/'.$last->id.'/edit')}}"> {{$last->contact_name}}</a></td>
                                            <td>{!!($last->view == 0) ? '<i class="fa fa-eye-slash btn btn-danger"></i>': '<i class="fa fa-eye btn btn-success"></i>' !!}</td>
                                            <td><span class="label label-success">{{contact()[$last->contact_type]}}</span></td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="{{url('/adminPanel/contact/')}}" class="btn btn-sm btn-info btn-flat pull-left">جميع الرسائل</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div>
                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">أحدث الأعضاء</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-danger">8 عدد الأعضاء</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach($lastUser as $userl)
                                    <li>
                                        <img src="/admin/dist/img/user1-128x128.jpg" alt="{{$userl->name}}" title="{{$userl->name}}">
                                        <a class="users-list-name" href="{{url('/adminPanel/users/'.$userl->id.'/edit')}}">{{$userl->name}}</a>
                                        <span class="users-list-date">{{$userl->created_at}}</span>
                                    </li>
                                        @endforeach

                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{url('/adminPanel/users')}}" class="uppercase">كل الأعضاء</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </div><!-- /.col -->

            <div class="col-md-4">

                <div class="box box-default" style="display: none">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="150"></canvas>
                                </div><!-- ./chart-responsive -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">اخر العقارات المضافة</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($lastBu as $bul)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{check_image($bul->image,'/public/upload/thumb/','/upload/thumb/')}}" alt="{{$bul->bu_name}}" title="{{$bul->bu_name}}">
                                </div>
                                <div class="product-info">
                                    <a href="{{url('/adminPanel/bu/'.$bul->id.'/edit')}}" class="product-title">{{$bul->bu_name}}  <span class="label label-warning pull-left">{{$bul->bu_price}}</span></a>
                                    <span class="product-description">
                          {{$bul->bu_small_disc}}
                        </span>
                                </div>
                            </li><!-- /.item -->
                                @endforeach
                        </ul>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('/adminPanel/bu')}}" class="uppercase">كل العقارات</a>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


        <!-- Main row -->
    </section>
    @endsection
@section('footer')
    <script>
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
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
                        @foreach($new as $create)
                            @if(is_array($create))
                                {{$create['counting']}},
                            @else
                                {{$create}},
                            @endif
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
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {
                }
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [
                @foreach($mapping as $map)
                    {latLng: [{{$map->bu_latituide}},{{$map->bu_langtuide}}], name: '{{$map->bu_name}}'},
                @endforeach
            ]
        });

    </script>
    @endsection