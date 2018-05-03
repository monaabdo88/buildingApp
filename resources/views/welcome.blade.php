@extends('layouts.app')
@section('title')
      الرئيسية
@endsection
@section('header')
    {!! Html::style('site/css/reset.css') !!}
    {!! Html::style('site/css/style2.css') !!}
    {!! Html::script('site/js/modernizr.js') !!}
@endsection
@section('content')
    <div class="banner text-center" style="background:url({{check_image(get_setting('main_slide'))}}) no-repeat center">
        <div class="container">
            <div class="banner-info">
                <h1>أهلاً بك في موقع {{get_setting('site_name')}}</h1>
                <p>
                    {!! Form::open(['url'=>'search','method'=>'get']) !!}
                        <div class="row">
                            <div class="col-md-3">{!! Form::select('bu_type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}</div>
                            <div class="col-md-3">{!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع الملكية']) !!}</div>
                            <div class="col-md-3">{!! Form::select('bu_place',bu_place(),null,['class'=>'form-control select-place','placeholder'=>'المنطقة']) !!}</div>
                            <div class="col-md-3">{!! Form::select('rooms_num',room_number(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}</div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-3">{!! Form::submit('أبحث',['class'=>'btn btn-block btn-success']) !!}</div>
                            <div class="col-md-3">{!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'المساحة']) !!}</div>
                            <div class="col-md-3">{!! Form::text('bu_to',null,['class'=>'form-control','placeholder'=>'سعر العقار إلى']) !!}</div>
                            <div class="col-md-3">{!! Form::text('bu_from',null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}</div>
                        </div>
                    {!! Form::close() !!}
                </p>
                <a class="banner_btn" href="{{url('/show_all')}}">قراءة المزيد</a> </div>
        </div>
    </div>
    <div class="main">
        <ul class="cd-items cd-container">
            @foreach(\App\Bu::where('bu_status',0)->get() as $bu_home)
            <li class="cd-item effect8">
                <img src="{{check_image($bu_home->image,'/public/upload/thumb/','/upload/thumb/')}}" alt="{{$bu_home->bu_name}}" title="{{$bu_home->bu_name}}">
                <a href="#0" data-id="{{$bu_home->id}}" class="cd-trigger" title="{{$bu_home->bu_name}}">قراءة المزيد </a>
            </li> <!-- cd-item -->
                @endforeach
        </ul> <!-- cd-items -->
        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li><img class="imgbox" src="site/images/item-1.jpg" alt="Product 1"></li>
                </ul> <!-- cd-slider -->


            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2 class="titlebox"></h2>
                <p class="disbox"></p>

                <ul class="cd-item-action">
                    <li><a href="" class="add-to-cart pricebox button">Add to cart</a></li>
                    <li><a href="#0" class="morebox">اقرأ المزيد </a></li>
                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->

    </div>
@endsection
@section('footer')
    {!! Html::script('site/js/jquery-2.1.1.js') !!}
    {!! Html::script('site/js/velocity.min.js') !!}
    <script>
        function urlHome() {
            return '{{Request::root()}}';
        }
        function noImg() {
            return '{{get_setting('no-image')}}';
        }
    </script>
    {!! Html::script('site/js/main.js') !!}
@endsection
