@extends('admin.layouts.layout')
@section('title')
    تعديل عقار {{$bu->name}}
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
            <li class="active">    تعديل عقار {{$bu->name}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    تعديل عقار {{$bu->name}}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <h4 class="box-title">معلومات صاحب العقار</h4>
                            <div class="text2">
                                @if($users == '')
                                    <div class="col-md-4">تمت اضافة هذا العقار من خلال زائر</div>
                                    @else
                                <div class="col-md-4">أسم المستخدم : {{$users->name}}</div>
                                <div class="col-md-4"> البريد الإلكتروني:{{$users->email}}</div>
                                <div class="col-md-4">صلاحيات المستخدم :
                                    @if($users->is_admin == 1)
                                        <a href="{{url('adminPanel/users/'.$users->id.'/edit')}}">مدير</a>
                                    @else
                                        <a href="{{url('/adminPanel/users/'.$users->id.'/edit')}}">عضو عادي </a>
                                    @endif
                                </div>
                                    @endif
                            </div>
                        <div class="clearfix"></div>
                        <br/>
                        {!! Form::model($bu,['route'=>['adminPanel.bu.update',$bu->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true]) !!}
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