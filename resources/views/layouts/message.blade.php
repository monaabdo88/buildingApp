@if(Session::has('flash_message'))
    <div class="container">
        <div id="msg" class="alert alert-danger">{{Session::get('flash_message')}}</div>
    </div>
@endif