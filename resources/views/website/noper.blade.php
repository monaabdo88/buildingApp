@extends('layouts.app')
@section('title')
    {{$msgTitle}}
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
                    <li>{{$msgTitle}}</li>
                </ol>
                <div class="profile-content">
                    <div class="alert alert-danger">
                        <p class="text-center">
                            {{$msgBody}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection