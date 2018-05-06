<div class="profile-sidebar">
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav nav-links">
            <li class="active">
                <a href="{{url('/show_all')}}">
                    <i class="glyphicon glyphicon-home"></i>
                    كل العقارات </a>
            </li>
            <li>
                <a href="{{url('/forrent')}}">
                    <i class="glyphicon glyphicon-user"></i>
                    إيجار</a>
            </li>
            <li>
                <a href="{{url('/forbuy')}}" target="_blank">
                    <i class="glyphicon glyphicon-ok"></i>
                    تمليك </a>
            </li>
            <li>
                <a href="{{url('/type/0')}}">
                    <i class="glyphicon glyphicon-flag"></i>
                    شقة </a>
            </li>
            <li>
                <a href="{{url('/type/1')}}">
                    <i class="glyphicon glyphicon-flag"></i>
                    فيلا </a>
            </li>
            <li>
                <a href="{{url('/type/2')}}">
                    <i class="glyphicon glyphicon-flag"></i>
                    منزل </a>
            </li>
            <li>
                <a href="{{url('/type/3')}}">
                    <i class="glyphicon glyphicon-flag"></i>
                    شاليه </a>
            </li>
        </ul>

    </div>
    <!-- END MENU -->
</div>
<div class="profile-sidebar">
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <hr/>
        <h4 class="text-center">البحث المتقدم</h4>
        <ul class="nav nav-links search-form">
            {!! Form::open(['url'=>'search','method'=>'get']) !!}
            <li>{!! Form::text('bu_from',null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}</li>
            <li>{!! Form::text('bu_to',null,['class'=>'form-control','placeholder'=>'سعر العقار إلى']) !!}</li>
            <li>{!! Form::select('bu_place',bu_place(),null,['class'=>'form-control select-place','placeholder'=>'المنطقة']) !!}</li>
            <li>{!! Form::select('rooms_num',room_number(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}</li>
            <li>{!! Form::select('bu_type',bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}</li>
            <li>{!! Form::select('bu_rent',bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع الملكية']) !!}</li>
            <li>{!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'المساحة']) !!}</li>
            <li>{!! Form::submit('أبحث',['class'=>'btn btn-block btn-success']) !!}</li>
            {!! Form::close() !!}
        </ul>
    </div>
    <!-- END MENU -->
</div>