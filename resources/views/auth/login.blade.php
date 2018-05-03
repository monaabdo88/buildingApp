@extends('layouts.app')
@section('title')
      تسجيل الدخول
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="contact_bottom">
                <hr/>
                <h3 class="text-center">تسجيل الدخول</h3>
                <hr />
                    <br/>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                <input id="email" type="email" class="form-control" placeholder="البريد الإلكتروني ....." name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-2 control-label">البريد الإلكتروني</label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-2">
                                <input id="password" type="password" class="form-control" placeholder="كلمة المرور ....." name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password" class="col-md-2 control-label">كلمة المرور</label>

                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-6">
                                <div class="checkbox col-md-6">
                                    <label>
                                        <span style="float: left;">تذكرني</span>
                                        <input type="checkbox" style="float: right;" name="remember">

                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> تسجيل دخول
                                </button>

                                <a class="banner_btn btn" href="{{ url('/password/reset') }}">نسيت كلمة المرور ؟</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <div class="clearfix"></div>
        <br/>
            <br/>
        </div>
    </div>
@endsection
