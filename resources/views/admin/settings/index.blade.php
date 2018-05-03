@extends('admin.layouts.layout')
@section('title')
إعدادات الموقع
@endsection
@section('header')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            تعديل إعدادات الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">تعديل إعدادات الموقع</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">  تعديل إعدادات الموقع</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" role="form"  action="{{ url('/adminPanel/siteSettings') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach($siteSetting as $site)
                                <div class="form-group{{ $errors->has($site->namesetting) ? ' has-error' : '' }}">
                                    <label for="{{$site->namesetting}}" class="col-md-2 control-label">{{$site->slug}}</label>
                                    <div class="col-md-6 col-md-offset-2">
                                        @if($site->type == 0)
                                            {!! Form::text($site->namesetting,$site->value,['class'=>'form-control']) !!}
                                        @elseif($site->type == 1)
                                            {!! Form::textarea($site->namesetting,$site->value,['class'=>'form-control']) !!}
                                        @elseif($site->type == 2)
                                            {!! Form::select($site->namesetting,['0' => 'مغلق', '1' => 'مفتوح'],$site->value,['class'=>'form-control']) !!}
                                        @elseif($site->type == 3)
                                            @if($site->value != '')
                                                <img src="{{check_image($site->value)}}" class="img-responsive img-thumbnail col-md-3 pull-left"/>
                                            @endif
                                            {!! Form::file($site->namesetting,null,['class'=>'form-control']) !!}
                                        @endif
                                        @if ($errors->has($site->namesetting))
                                            <span class="help-block">
                                            <strong>{{ $errors->first($site->namesetting) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>  حفظ الإعدادات
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
@section('footer')

@endsection