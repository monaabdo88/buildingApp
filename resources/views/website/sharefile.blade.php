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
                            <div class="productprice"><div class="pull-left">
                                    @if($bu->bu_status == 0)
                                    <a href="{{url('/build/'.$bu->id)}}" class="btn btn-primary btm-sm text-center" role="button">قراءة المزيد
                                    @else
                                        <span class="btn btn-danger btm-sm text-center">بإنتظار التفعيل</span>
                                        @endif
                                    </a></div>
                                <div class="pricetext">{{$bu->bu_price}}</div></div>
                        </div>
                </div>

            @endforeach
    @else
    <div class="alert alert-danger">
        <p class="text-center">لا يوجد أي عقارات حالياً</p>
    </div>
@endif