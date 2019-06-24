<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trang Quản Trị dành cho trang web của tôi">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trang Quản Trị</title>

    <!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">

    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin_asset/dist/css/style.css">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Header -->
        @include('layout.header')
        <!-- End Header -->

        <!-- Page Content -->
        @yield('content')
        <!-- End Page Content -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
    @yield('script')
    

    <script>
        $(document).ready(function(){
            $('#dataTables-example1').DataTable({
                responsive:true,
                ajax :{
                    url: "theloai/danhsachajax",
                    // success: function(response){
                    //     console.log(response);
                    // //$('#dataTables-example').DataTable().ajax.reload(); 
                    // },
                    // error: function(jqXHR, textStatus, errorThrown) { 
                    //     console.log(JSON.stringify(jqXHR));
                    //     console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    // }
                }
                
            })
            
        })
        $(document).ready(function(){
            $('#dataTables-example2').DataTable({
                responsive:true,
                ajax :{
                    url: "loaitin/danhsachajax",
                    // success: function(response){
                    //     console.log(response);
                    // //$('#dataTables-example').DataTable().ajax.reload(); 
                    // },
                    // error: function(jqXHR, textStatus, errorThrown) { 
                    //     console.log(JSON.stringify(jqXHR));
                    //     console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    // }
                }
                
            })
            
        })
        function suatheloai(id){
            $.ajax({
            method: 'GET', 
            url: 'theloai/sua/' + id,
            success: function(response){
                $("#myModal1").modal("show");
                var obj = JSON.parse(response);
                $("#txtName1").val(obj.ten);
                $("#txtid").val(obj.id);
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        }); 
        }

        function xoatheloai(id){
            $.ajax({
            method: 'GET', 
            url: 'theloai/xoa/' + id,
            success: function(response){
                //var obj = JSON.parse(response);
                console.log(response);
                $('#dataTables-example1').DataTable().ajax.reload(); 
                alert('Xóa Thành Công');
               //$("#txtid").val(obj.id);
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })
        }
    </script>
</body>
</html>