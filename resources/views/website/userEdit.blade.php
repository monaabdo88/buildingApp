@extends('layouts.app')
@section('title')
تعديل معلومات العضو {{$user->name}}
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
                    <li><a href="#">تعديل الملف الشخصي {{$user->name}}</a> </li>
                </ol>
                <div class="profile-content">
                    {!! Form::model($user,['route'=>['user.editInfo',$user->id],'method'=>'patch','class'=>'form-horizontal']) !!}
                    @include('admin.users.form',['user_type'=> 1])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>



@endsection