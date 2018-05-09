@extends('layouts.app')
@section('title')
        تعديل عقار
{{$bu->bu_name}}
@endsection
@section('header')
    {!! Html::style('cus/bu.css') !!}
@endsection
@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-3 pull-right">
                @include('website.sidebar')

            </div>

            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">الرئيسية</a></li>
                    <li>تعديل العقار {{$bu->bu_name}}</li>
                </ol>
                <div class="profile-content">
                    {!! Form::model($bu,['route'=>['adminPanel.bu.update',$bu->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true]) !!}
                    @include('admin.bu.form');
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



@endsection