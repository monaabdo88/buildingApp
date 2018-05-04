@extends('layouts.app')
@section('title')
عقارات العضو {{$user->name}}
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
                    <li><a href="#">عقاراتي</a> </li>
                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key=> $value)
                                <li><a href="{{url('/search?'.$key.'='.$value)}}">{{searchnameField()[$key]}} ->
                                        @if($key == 'bu_type')
                                            {{bu_type()[$value]}}
                                        @elseif($key == 'bu_rent')
                                            {{bu_rent()[$value]}}
                                        @elseif($key == 'bu_place')
                                            {{bu_place()[$value]}}
                                        @else
                                            {{$value}}
                                        @endif
                                    </a></li>
                            @endforeach
                        @endif
                    @endif

                </ol>
                <div class="profile-content">
                    @include('website.sharefile',['bu_all'=> $bu_all])
                    <div class="clearfix"></div>
                    <div class="text-center">
                        @if(!isset($search))
                            {{$bu_all->appends(Request::except('page'))->render()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection