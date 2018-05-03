@extends('admin.layouts.layout')
@section('title')
    إضافة عقار جديد
@endsection
@section('header')
    {!! Html::style('cus/css/select2.min.css') !!}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            التحكم في العقارات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/adminPanel/bu')}}">التحكم في العقارات</a></li>
            <li class="active">إضافة عقار جديد </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">أضف عقار جديد</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url'=>'/adminPanel/bu','class'=>'form-horizontal','method'=>'post','files'=>true]) !!}
                            @include('admin.bu.form');
                        {!! Form::close() !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $(".select-place").select2({
            dir:"rtl"
        });
    </script>
@endsection