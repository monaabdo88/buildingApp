                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label pull-right">أسم المستخدم</label>
                            <div class="col-md-6 col-md-offset-2">
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label pull-right">البريد الإلكتروني </label>
                            <div class="col-md-6 col-md-offset-2">
                                {!! Form::text('email',null,['class'=>'form-control']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label pull-right">كلمة المرور </label>
                            <div class="col-md-6 col-md-offset-2">
                                <input id="password" type="password" placeholder="كلمة المرور" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-2 control-label pull-right">تأكيد كلمة المرور </label>
                            <div class="col-md-6 col-md-offset-2">
                                <input id="password-confirm" type="password" placeholder="تأكيد كلمة المرور ....." class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if($user_type != 1)
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label pull-right"> نوع العضوية </label>
                            <div class="col-md-6 col-md-offset-2">
                                {!! Form::select('is_admin',['0' => 'عضو', '1' => 'مدير'],null,['class'=>'form-control']) !!}
                                @if ($errors->has('is_admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>  حفظ
                                </button>
                            </div>
                        </div>
