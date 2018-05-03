@if(Session::has('flash_message'))
    <script type="text/javascript">
        swal({
            title: "{{Session::get('flash_message')}}",
            text: "هذه الرسالة سوف تختفي بعد 5 ثانية",
            timer: 5000,
            showConfirmButton: false
        });
    </script>
@endif

