@extends('layouts.app')
@section('title')
تمت الاضافة
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
                    <li><a href="{{url('/user/create/bu')}}">إضافة عقار جديد</a></li>
                    <li>تمت الاضافة</li>
                </ol>
                <div class="profile-content">
                   <div class="alert alert-success">
                       <p class="text-center">تمت اضافة العقار بنجاح ....</p>
                   </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



@endsection