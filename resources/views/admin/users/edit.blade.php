@extends('admin.layouts.layout')
@section('title')
    تعديل عضوية {{$user->name}}
@endsection
@section('header')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            التحكم في العضويات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/adminPanel/users')}}">التحكم في العضويات</a></li>
            <li class="active">    تعديل عضوية {{$user->name}}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    تعديل عضوية {{$user->name}}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($user,['route'=>['adminPanel.users.update',$user->id],'method'=>'patch','class'=>'form-horizontal']) !!}
                            @include('admin.users.form');
                        {!! Form::close() !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
@section('footer')

@endsection