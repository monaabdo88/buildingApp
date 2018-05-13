{{ csrf_field() }}

<div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">
    <label for="bu_name" class="col-md-2 control-label pull-right">أسم العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::text('bu_name',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_name'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">
    <label for="bu_square" class="col-md-2 control-label pull-right">مساحة العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::text('bu_square',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_square'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_square') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">
    <label for="bu_price" class="col-md-2 control-label pull-right">سعر العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::text('bu_price',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_price'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_price') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('rooms_num') ? ' has-error' : '' }}">
    <label for="rooms_num" class="col-md-2 control-label pull-right"> عدد الغرف</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::select('rooms_num',room_number(),null,['class'=>'form-control']) !!}
        @if ($errors->has('rooms_num'))
            <span class="help-block">
                <strong>{{ $errors->first('rooms_num') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bath_num') ? ' has-error' : '' }}">
    <label for="bath_num" class="col-md-2 control-label pull-right"> عدد الحمامات</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::text('bath_num',null,['class'=>'form-control']) !!}
        @if ($errors->has('bath_num'))
            <span class="help-block">
                <strong>{{ $errors->first('bath_num') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
    <label for="bu_place" class="col-md-2 control-label pull-right">المنطقة</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::select('bu_place',bu_place(),null,['class'=>'form-control select-place']) !!}
        @if ($errors->has('bu_place'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_place') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
    <label for="bu_rent" class="col-md-2 control-label pull-right">نوع الملكية</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_rent'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_rent') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">
    <label for="bu_type" class="col-md-2 control-label pull-right">نوع العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::select('bu_type',bu_type(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_type'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_type') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
    <label for="bu_meta" class="col-md-2 control-label pull-right">الكلمات الدلالية</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::textarea('bu_meta',null,['class'=>'form-control','rows'=>4]) !!}
        @if ($errors->has('bu_meta'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_meta') }}</strong>
            </span>
        @endif
    </div>
</div>
@if(!isset($user))
<div class="form-group{{ $errors->has('bu_small_disc') ? ' has-error' : '' }}">
    <label for="bu_small_disc" class="col-md-2 control-label pull-right"> وصف العقار لمحركات البحث</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::textarea('bu_small_disc',null,['class'=>'form-control','rows'=>4]) !!}
        @if ($errors->has('bu_small_disc'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_small_disc') }}</strong>
            </span>
        @endif
    </div>
</div>
@endif
<div class="form-group{{ $errors->has('bu_langtuide') ? ' has-error' : '' }}">
    <label for="bu_langtuide" class="col-md-2 control-label pull-right">خط الطول</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::textarea('bu_langtuide',null,['class'=>'form-control','rows'=>4]) !!}
        @if ($errors->has('bu_langtuide'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_langtuide') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_latituide') ? ' has-error' : '' }}">
    <label for="bu_latituide" class="col-md-2 control-label pull-right"> دائرة العرض</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::textarea('bu_latituide',null,['class'=>'form-control','rows'=>4]) !!}
        @if ($errors->has('bu_latituide'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_latituide') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('bu_large_disc') ? ' has-error' : '' }}">
    <label for="bu_large_disc" class="col-md-2 control-label pull-right">  وصف العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::textarea('bu_large_disc',null,['class'=>'form-control','rows'=>4]) !!}
        @if ($errors->has('bu_large_disc'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_large_disc') }}</strong>
            </span>
        @endif
    </div>
</div>
@if(!isset($user))
    <div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">
    <label for="bu_status" class="col-md-2 control-label pull-right">حالة العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::select('bu_status',bu_status(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_status'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_status') }}</strong>
            </span>
        @endif
    </div>
    </div>
@endif
<div class="form-group{{ $errors->has('image') ? 'has-error':'' }}">
    <label class="col-md-2 control-label pull-right" for="image">صورة العقار</label>
    <div class="col-md-6 col-md-offset-2">
        {!! Form::file('image',null,['class'=>'form-control']) !!}
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>
@if(isset($edit))
@if($bu->image)
    <img src="{{Request::root().'/upload/'.$bu->image}}" class="img-responsive img-thumbnail col-md-3 pull-left" />
    @endif
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4 text-center">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>   حفظ
        </button>
    </div>
</div>
