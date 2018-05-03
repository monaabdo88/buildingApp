                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                                <label for="contact_name" class="col-md-2 control-label"> أسم المرسل</label>
                                <div class="col-md-6 col-md-offset-2">
                                    {!! Form::text('contact_name',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('contact_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                                <label for="contact_email" class="col-md-2 control-label">البريد الإلكتروني</label>
                                <div class="col-md-6 col-md-offset-2">
                                    {!! Form::text('contact_email',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('contact_email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('contact_subject') ? ' has-error' : '' }}">
                                <label for="contact_subject" class="col-md-2 control-label">عنوان الرسالة</label>
                                <div class="col-md-6 col-md-offset-2">
                                    {!! Form::text('contact_subject',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('contact_subject'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_subject') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
                                <label for="bu_place" class="col-md-2 control-label">نوع الرسالة</label>
                                <div class="col-md-6 col-md-offset-2">
                                    {!! Form::select('contact_type',contact(),null,['class'=>'form-control select-place']) !!}
                                    @if ($errors->has('contact_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('contact_msg') ? ' has-error' : '' }}">
                                <label for="contact_msg" class="col-md-2 control-label"> الرسالة</label>
                                <div class="col-md-6 col-md-offset-2">
                                    {!! Form::textarea('contact_msg',null,['class'=>'form-control','rows'=>4]) !!}
                                    @if ($errors->has('contact_msg'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_msg') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>  حفظ الإعدادات
                                    </button>
                                </div>
                            </div>
