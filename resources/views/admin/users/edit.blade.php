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
                            @include('admin.users.form',['user_type'=> 0]);
                        {!! Form::close() !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">العقارات المفعلة</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">العقارات الغير مفعلة </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <table class="table table-responsive table-bordered">
                                <tr>
                                    <th>عنوان العقار</th>
                                    <th>سعر العقار</th>
                                    <th>نوع العقار</th>
                                    <th>المكان</th>
                                    <th>نوع الملكية</th>
                                    <th>تاريخ الإضافة</th>
                                    <th>التحكم</th>
                                </tr>
                                @foreach($activeBu as $active)
                                    <tr>
                                        <td><a href="{{url('/adminPanel/bu/'.$active->id.'/edit')}}">{{$active->bu_name}}</a></td>
                                        <td>{{$active->bu_price}}</td>
                                        <td>{{bu_type()[$active->bu_type]}}</td>
                                        <td>{{bu_place()[$active->bu_place]}}</td>
                                        <td>{{bu_rent()[$active->bu_rent]}}</td>
                                        <td>{{$active->created_at}}</td>
                                        <td><a href="{{url('/adminPanel/change_status/'.$active->id.'/1')}}">إلغاء التفعيل</a> </td>
                                    </tr>
                                @endforeach;
                            </table>
                            <div class="text-center">
                                    {{$activeBu->appends(Request::except('page'))->render()}}
                                </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <table class="table table-responsive table-bordered">
                                <tr>
                                    <th>عنوان العقار</th>
                                    <th>سعر العقار</th>
                                    <th>نوع العقار</th>
                                    <th>المكان</th>
                                    <th>حالة العقار</th>
                                    <th>تاريخ الإضافة</th>
                                    <th>التحكم</th>
                                </tr>
                                @foreach($unactiveBu as $unactive)
                                    <tr>
                                        <td><a href="{{url('/adminPanel/bu/'.$unactive->id.'/edit')}}">{{$unactive->bu_name}}</a></td>
                                        <td>{{$unactive->bu_price}}</td>
                                        <td>{{bu_type()[$unactive->bu_type]}}</td>
                                        <td>{{bu_place()[$unactive->bu_place]}}</td>
                                        <td>{{bu_rent()[$unactive->bu_rent]}}</td>
                                        <td>{{$unactive->created_at}}</td>
                                        <td><a href="{{url('/adminPanel/change_status/'.$unactive->id.'/0')}}">تفعيل</a> </td>
                                    </tr>
                                @endforeach;
                            </table>
                            <div class="text-center">
                                    {{$unactiveBu->appends(Request::except('page'))->render()}}
                                </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </section><!-- /.content -->

@endsection
@section('footer')

@endsection