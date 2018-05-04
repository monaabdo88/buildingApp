@extends('layouts.app')
@section('title')
إضافة عقار
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
                    <li>إضافة عقار جديد</li>
                </ol>
                <div class="profile-content">
                    {!! Form::open(['url'=>'/user/create/bu','class'=>'form-horizontal','method'=>'post','files'=>true]) !!}
                        @include('admin.bu.form',['user'=> 1])
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



@endsection