@extends('layouts.app')
@section('title')
      تسجيل عضوية جديدة
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="contact_bottom">
                <hr/>
                <h3 class="text-center">تسجيل عضوية جديدة</h3>
                <hr />
                <br/>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                <input id="name" type="text" class="form-control" placeholder="أسم المستخدم ....." name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="name" class="col-md-2 control-label">أسم المستخدم</label>

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                <input id="email" type="email" class="form-control" placeholder="البريد الإلكتروني ....." name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-2 control-label">البريد الإلكتروني </label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                <input id="password" type="password" placeholder="كلمة المرور" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password" class="col-md-2 control-label">كلمة المرور </label>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                <input id="password-confirm" type="password" placeholder="تأكيد كلمة المرور ....." class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password-confirm" class="col-md-2 control-label">تأكيد كلمة المرور </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> تسجيل عضوية
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection
