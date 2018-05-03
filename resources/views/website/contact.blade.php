@extends('layouts.app')
@section('title')
    اتصل بنا
@endsection
@section('header')
    {!! Html::style('cus/bu.css') !!}
    <style type="text/css">
        .input-group-addon{
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }
        .input-group-addon:first-child{
            border-left: 0;
            border-right:1px solid #ccc;
        }
    </style>
@endsection
@section('content')

    <div class="container" style="padding:50px 0;">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                {!! Form::open(['url' => '/contact' , 'method' => 'post']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="name">
                                    الأسم</label>
                                <input type="text" class="form-control" name="contact_name" id="name" placeholder="أكتب الأسم " required="required" value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name : ''}}" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    البريد الإلكتروني </label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" class="form-control" name="contact_email" id="email" placeholder="أكتب البريد الإلكتروني " required="required" value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : ''}}"/></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    موضوع الرسالة</label>
                                <select id="subject" name="contact_type" class="form-control" required="required">
                                   @foreach(contact() as $key => $con)
                                       <option value="{{$key}}">{{$con}}</option>
                                       @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    محتوى الرسالة</label>
                                <textarea name="contact_msg" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="أكتب محتوى الرسالة"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-left" id="btnContactUs">
                                إرسال </button>

                        </div>
                    </div>
    {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> مكتبنا </legend>
                <address>
                    <strong>العنوان</strong><br>
                    {{nl2br(get_setting('address'))}}<br/>
                    <abbr title="Phone">
                        تليفون :</abbr>
                    {{get_setting('phone')}}
                </address>
                <address>
                    <strong>البريد الإلكتروني </strong><br>
                    <a href="mailto:{{get_setting('site_email')}}">{{get_setting('site_email')}}</a>
                </address>
            </form>
        </div>
    </div>
</div>
@endsection