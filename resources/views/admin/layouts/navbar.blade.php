<li><a href="{{url('/adminPanel/siteSettings')}}"><i class="fa fa-cog"></i><span>  تعديل إعدادات الموقع </span></a></li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i> <span>التحكم في العضويات</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{url('/adminPanel/users/create')}}"><i class="fa fa-circle-o"></i> إضافة عضو </a></li>
        <li><a href="{{url('/adminPanel/users')}}"><i class="fa fa-circle-o"></i> كل الأعضاء </a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i> <span>التحكم في العقارات</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{url('/adminPanel/bu/create')}}"><i class="fa fa-circle-o"></i> إضافة عقار </a></li>
        <li><a href="{{url('/adminPanel/bu')}}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-envelope-o"></i> <span>التحكم في الرسائل</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
        <!--<li><a href="{{url('/adminPanel/contact/create')}}"><i class="fa fa-circle-o"></i> إضافة رسالة </a></li>-->
        <li><a href="{{url('/adminPanel/contact')}}"><i class="fa fa-circle-o"></i> كل الرسائل </a></li>
    </ul>
</li>
<li><a href="{{url('/adminPanel/buYear/statics')}}"><i class="fa fa-bar-chart"></i><span> كل الأحصائيات
    </span></a></li>
