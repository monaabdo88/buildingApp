<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{get_setting('site_disc')}}">
    <meta name="keywords" content="{{get_setting('site_tags')}}">
    <meta name="author" content="monaabdo88">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{get_setting('site_name')}}
        |
        @yield('title')
    </title>
    {!! Html::style('site/css/bootstrap.min.css') !!}
    {!! Html::style('site/css/flexslider.css') !!}
    {!! Html::style('cus/css/select2.min.css') !!}
    {!! Html::style('site/css/font-awesome.min.css') !!}
    {!! Html::style('site/css/style.css') !!}
    {!! Html::script('site/js/jquery.min.js') !!}
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    @if(get_setting('site_status') == 0)
        <div class="alert alert-danger col-md-offset-2 col-md-8" style="margin-top:20%">
            <p class="text-center"><b>{{get_setting('site_textclose')}}</b></p>
        </div>
        {{die()}}
    @endif
    @yield('header')
</head>
<body id="app-layout" >
<div class="header">
    <div class="container"> <a class="navbar-brand pull-right" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> القاهرة للعقارات</a>
        <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="site/images/nav_icon.png" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="{{setActive(['home','current'])}}"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="{{setActive(['show_all','current'])}}"><a href="{{url('/show_all')}}">جميع العقارات</a></li>
                <li class="dropdown {{setActive(['search','current'])}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">إيجار <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach(bu_type() as $key=>$type)
                            <li style="width:100%;"><a href="{{ url('/search?bu_rent=1&bu_type='.$key) }}">{{$type}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown {{setActive(['search','current'])}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">تمليك <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach(bu_type() as $key=>$type)
                            <li style="width:100%;"><a href="{{ url('/search?bu_rent=0&bu_type='.$key) }}">{{$type}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{setActive(['contact','current'])}}"><a href="{{url('/contact')}}"> أتصل بنا</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">تسجيل الدخول</a></li>
                    <li><a href="{{ url('/register') }}">عضوية جديدة</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{url('/user/editInfo')}}">
                                    <i class="fa fa-edit"></i>
                                    تعديل البيانات  </a>
                            </li>
                            <li>
                                <a href="{{url('/user/showBu/0')}}">
                                    <i class="fa fa-check"></i>
                                    عقارات مفعلة <label class="label label-default">{{get_count(0,Auth::user()->id)}}</label> </a>
                            </li>
                            <li>
                                <a href="{{url('/user/showBu/1')}}">
                                    <i class="fa fa-clock-o"></i>
                                    عقارات بإنتظار التفعيل <label class="label label-default">{{get_count(1,Auth::user()->id)}}</label></a>
                            </li>

                            <li>
                                <a href="{{url('/user/create/bu')}}" target="_blank">
                                    <i class="fa fa-plus"></i>
                                    إضافة عقار </a>
                            </li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> تسجيل الخروج </a></li>
                        </ul>
                    </li>
                @endif
                <div class="clear"></div>
            </ul>
        </div>
    </div>
</div>
    @include('layouts.message')
    @yield('content')

<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" href="{{get_setting('facebook')}}"></a>
            <a class="fa fa-twitter social-icon" href="{{get_setting('twitter')}}"></a>
            <a class="fa fa-linkedin social-icon" href="{{get_setting('linkedin')}}"></a>
            <a class="fa fa-google-plus social-icon" href="{{get_setting('google_plus')}}"></a> </div>
        <div class="copy">
            <p>{{get_setting('site_copyrights')}}</p>
        </div>
    </div>
</div>
{!! Html::script('site/js/bootstrap.min.js') !!}
{!! Html::script('site/js/jquery.flexslider.js') !!}
{!! Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
    $(".select-place").select2({
        dir:"rtl"
    });
</script>
@yield('footer')
</body>
</html>
