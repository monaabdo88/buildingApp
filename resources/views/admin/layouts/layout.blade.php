<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        لوحة التحكم |
        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    {!! Html::style('admin/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    @yield('header')
    {!! Html::style('admin/dist/css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('admin/dist/css/skins/_all-skins.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('admin/plugins/iCheck/flat/blue.css') !!}
    <!-- Morris chart -->
    {!! Html::style('admin/plugins/morris/morris.css') !!}
    <!-- jvectormap -->
    {!! Html::style('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    <!-- Date Picker -->
    {!! Html::style('admin/plugins/datepicker/datepicker3.css') !!}
    <!-- Daterange picker -->
    {!! Html::style('admin/plugins/daterangepicker/daterangepicker-bs3.css') !!}
    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('admin/dist/fonts/fonts-fa.css') !!}
    {!! Html::style('admin/dist/css/bootstrap-rtl.min.css') !!}
    {!! Html::style('admin/dist/css/bootstrap-rtl.min.css') !!}
    {!! Html::style('cus/sweetalert.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/adminPanel')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">لوحة تحكم الموقع</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="{{url('/adminPanel')}}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">{{count_unread_msg()}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">لديك عدد  {{count_unread_msg()}} رسائل غير مقروءة</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        @foreach(unread_msg() as $key => $value)
                                            <li>
                                                <a href="{{url('/adminPanel/contact/'.$value->id.'/edit')}}">
                                                    <h4>
                                                        {{$value->contact_name}}
                                                        <small><i class="fa fa-clock-o"></i> {{$value->created_at}}</small>
                                                    </h4>
                                                    <p>{{str_limit($value->contact_msg,10)}}</p>
                                                </a>
                                            </li>

                                        @endforeach
                                       </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer"><a href="{{url('/adminPanel/contact/')}}">مشاهدة جميع الرسائل</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">{{get_count_active('1')}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">لديك عدد {{get_count_active('1')}} عقار غير مفعل</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                             <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        @foreach(\App\Bu::where('bu_status',1)->get() as $bu_info)
                                            <li>
                                                <a class="pull-right col-md-8" href="{{url('/adminPanel/bu/'.$bu_info->id.'/edit')}}">
                                                    <i class="fa fa-hotel"></i> <span> {{$bu_info->bu_name}}</span>
                                                </a>
                                                <a href="{{url('adminPanel/change_status/'.$bu_info->id.'/0')}}" class="pull-left col-md-4"><span>تفعيل العقار</span></a>
                                                <div class="clearfix"></div>
                                            </li>
                                        @endforeach

                                    </ul>
                            </li>
                            <li class="footer"><a href="{{url('/adminPanel/bu')}}">مشاهدة جميع العقارات </a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs"> {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p> {{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> أون لاين</a>
                </div>
            </div>
            <!-- search form --
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستوجو ...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"> القائمة الرئيسية</li>
                @include('/admin/layouts/navbar');
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">

        @yield('content')
    </div>
    <footer class="main-footer">
        <div class="pull-left hidden-xs">
            <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>


</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
{!! Html::script('admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.4 -->
{!! Html::script('admin/bootstrap/js/bootstrap.min.js') !!}
@yield('footer')
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! Html::script('admin/plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('admin/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('admin/plugins/knob/jquery.knob.js') !!}
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
{!! Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! Html::script('admin/plugins/datepicker/bootstrap-datepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! Html::script('admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('admin/plugins/fastclick/fastclick.min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('admin/dist/js/app.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('admin/dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('admin/dist/js/demo.js') !!}
{!! Html::script('cus/sweetalert.min.js') !!}
@include('/admin/layouts/f_message');
</body>
</html>
