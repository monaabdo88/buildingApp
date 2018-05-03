@extends('admin.layouts.layout')
@section('title')
    تعديل رسالة {{$contact->name}}
@endsection
@section('header')
{!! Html::style('cus/css/select2.min.css') !!}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            التحكم في الرسالةات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/adminPanel/contact')}}">التحكم في الرسائل</a></li>
            <li class="active">    تعديل رسالة {{$contact->name}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    تعديل رسالة {{$contact->contact_name}}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($contact,['route'=>['adminPanel.contact.update',$contact->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true]) !!}
                        @include('admin.contact.form');
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