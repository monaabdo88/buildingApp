@if(count($bu_all) > 0)
            @foreach($bu_all as $key=>$bu)
                @if($key % 3 == 0 && $key != 0)
                    <div class="clearfix">

                    </div>
                @endif
                <div class="col-md-4 pull-right">
                        <div class="productbox">
                            <img src="{{check_image($bu->image,'/public/upload/thumb/','/upload/thumb/')}}" class="img-responsive">
                            <div class="producttitle">{{$bu->bu_name}}</div>
                            <p class="text-justify">{{str_limit($bu->bu_small_disc,110)}}</p>
                            <div class="clearfix"></div>
                            <div class="productprice">
                                <div class="clearfix"></div>
                                <span class="pull-right">المساحة : {{$bu->bu_square}}</span>
                                <span class="pull-left">نوع الملكية : {{bu_rent()[$bu->bu_rent]}}</span>
                                <span class="pull-right">نوع العقار : {{bu_type()[$bu->bu_type]}}</span>
                                <span class="pull-left">المكان :{{bu_place()[$bu->bu_place]}}</span>
                                <div class="clearfix"></div>
                                <hr/>

                                    @if($bu->bu_status == 0)
                                    <div class="pull-left"><a href="{{url('/build/'.$bu->id)}}" class="btn btn-primary btm-sm text-center" role="button">قراءة المزيد</a></div>
                                    @else
                                        <div class="pull-right">
                                            <span class="btn btn-danger btm-sm text-center">بإنتظار التفعيل</span>
                                        </div>
                                        <div class="pull-left">
                                            <a href="{{url('/user/editbu/'.$bu->id)}}" class="btn btn-success">تعديل العقار</a>
                                        </div>
                                    @endif

                                <div class="pricetext">{{$bu->bu_price}}</div></div>
                        </div>
                </div>

            @endforeach
    @else
    <div class="alert alert-danger">
        <p class="text-center">لا يوجد أي عقارات حالياً</p>
    </div>
@endif