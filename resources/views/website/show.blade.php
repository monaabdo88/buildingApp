@extends('layouts.app')
@section('title')
{{$buInfo->bu_name}}
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
                    <li><a href="{{url('/show_all')}}">جميع العقارات</a> </li>
                    <li>{{$buInfo->bu_name}}</li>
                </ol>
                <div class="profile-content">
                    <h4>{{$buInfo->bu_name}}</h4>
                    <hr/>
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="{{url('/search?bu_type='.$buInfo->bu_type)}}" class="btn btn-default">
                            نوع العقار : {{bu_type()[$buInfo->bu_type]}}
                        </a>
                        <a href="{{url('/search?bu_square='.$buInfo->bu_square)}}" class="btn btn-default">
                             المساحة : {{$buInfo->bu_square}}
                        </a>
                        <a href="{{url('/search?bu_place='.$buInfo->bu_place)}}" class="btn btn-default">
                            المنطقة : {{bu_place()[$buInfo->bu_place]}}
                        </a>
                        <a href="{{url('/search?rooms_num='.$buInfo->rooms_num)}}" class="btn btn-default">
                            عدد الغرف : {{$buInfo->rooms_num}}
                        </a>
                        <a href="{{url('/search?bu_rent='.$buInfo->bu_rent)}}" class="btn btn-default">
                            نوع الملكية : {{bu_rent()[$buInfo->bu_rent]}}
                        </a>
                        <a href="{{url('/search?bu_price='.$buInfo->bu_price)}}" class="btn btn-default">
                            السعر : {{$buInfo->bu_price}}
                        </a>
                    </div>
                    <div class="pull-left">
                        <a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={{url('/build/'.$buInfo->id)}}&pubid=ra-42fed1e187bae420&title={{$buInfo->bu_name}} | {{get_setting('site_name')}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/linkedin.png" border="0" alt="LinkedIn"/></a>
                        <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{url('/build/'.$buInfo->id)}}%2F&pubid=ra-42fed1e187bae420&title={{$buInfo->bu_name}} | {{get_setting('site_name')}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                        <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{url('/build/'.$buInfo->id)}}&pubid=ra-42fed1e187bae420&title={{$buInfo->bu_name}} | {{get_setting('site_name')}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
                        <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{url('/build/'.$buInfo->id)}}&pubid=ra-42fed1e187bae420&title={{$buInfo->bu_name}} | {{get_setting('site_name')}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>

                    </div>
                    <hr/>
                    @if($buInfo->image)
                        <img src="{{check_image($buInfo->image)}}" />
                        @endif
                    <p>{!! nl2br($buInfo->bu_large_disc) !!}</p>
                    <div class="clearfix"></div>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <br>

                    <br/>
                    <div class="clearfix"></div>
                    <div id="map" style="width:100%;height:250px"></div>
                </div>
                <div class="clearfix"></div>
                <hr/>
                <div class="profile-content">
                    <h4>عقارات مشابهة</h4>
                    <hr/>
                    @include('website.sharefile',['bu_all'=>$same_rent])
                    @include('website.sharefile',['bu_all'=>$same_type])
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('footer')
    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng({{$buInfo->bu_langtuide}},{{$buInfo->bu_latituide}});
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ae6dba92643de0c"></script>

@endsection