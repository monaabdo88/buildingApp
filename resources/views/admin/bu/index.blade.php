@extends('admin.layouts.layout')
@section('title')
    التحكم في العقارات
@endsection
@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            التحكم في العقارات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminPanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/adminPanel/bu')}}">التحكم في العقارات</a></li>
            <li class="active">العقارات </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">العقارات</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th>أسم العقار</th>
                                <th> السعر</th>
                                <th> النوع </th>
                                <th>أضيف في </th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th> ID</th>
                                <th>أسم العقار</th>
                                <th> السعر</th>
                                <th> النوع </th>
                                <th>أضيف في </th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
@section('footer')
    <!-- DataTables -->
    {!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script type="text/javascript">


        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index()  < 5 && $(this).index() != 3 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
            }else if($(this).index() == 3){
                $(this).html( '<select>' +
                    @foreach(bu_type() as $key=> $type)
                            '<option value="{{$key}}">{{$type}}</option>'+
                        @endforeach
                    '</select>' );
            }
            else if($(this).index() == 5){
                $(this).html( '<select>' +
                        @foreach(bu_status() as $key=> $type)
                            '<option value="{{$key}}">{{$type}}</option>'+
                        @endforeach
                            '</select>' );
            }
        } );

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminPanel/bu/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'bu_name', name: 'bu_name'},
                {data: 'bu_price', name: 'bu_price'},
                {data: 'bu_type', name: 'bu_type'},
                {data: 'created_at', name: 'created_at'},
                {data: 'bu_status', name: 'bu_status'},
                {data: 'control', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
            .on( 'mouseover', 'td', function () {
                var colIdx = table.cell(this).index().column;

                if ( colIdx !== lastIdx ) {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                }
            } )
            .on( 'mouseleave', function () {
                $( table.cells().nodes() ).removeClass( 'highlight' );
            } );




    </script>

@endsection