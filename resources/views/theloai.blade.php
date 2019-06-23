@extends('layout.index')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header modalll">Thể Loại
                            <small> Danh Sách</small>
                            <button data-toggle="modal" data-target="#myModal" type="button" class="create_ca btn btn-success"><a style="text-decoration:none">Thêm Mới</a></button>
                        </h1>
                        
                    </div>

                    <!-- //form add the loai -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Thêm Thể Loại</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <p><label>Tên Thể Loại</label></p>
                                                <input class="form-control input-width" name="ten" id="txtName" placeholder="Nhập tên Thể Loại.." />
                                            </div>
                                            
                                            <button type="button" class="btn btn-default" id="add">Thêm</button>

                                            
                                        
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>


                            <!-- form sua the loai -->
                            <div class="modal" id="myModal1">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Sửa Thể Loại</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <p><label>Tên Thể Loại</label></p>
                                                <input class="form-control input-width" name="ten" id="txtName1"  />
                                                <input class="hide" id="txtid"/>
                                            </div>
                                            
                                            
                                            <button type="button" class="btn btn-default" id="edit">Sửa</button>

                                            
                                        
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>


                    <!-- /.col-lg-12 -->
                    <div class="clearfix"></div>
                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Thể Loại</th>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        

        <!-- Modal -->
        <!-- Modal -->
                                     

@endsection


@section('script')
    <script>
        $("#add").click(function() {
        var name = $('#txtName').val();
        $.ajax({
            method: 'POST', 
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'theloai/danhsach',
            data: {'ten' : name,_token: '{{csrf_token()}}'},
            success: function(response){
                $('#dataTables-example').DataTable().ajax.reload(); 
                $("#myModal").modal("hide");
                alert('Thêm Thành Công');
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        }); 
    });        
    </script>
    <script>
        $("#edit").click(function() {
        var name = $('#txtName1').val();
        var id = $('#txtid').val();
        $.ajax({
            method: 'POST', 
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'theloai/sua',
            data: {'ten' : name,'id':id,_token: '{{csrf_token()}}'},
            success: function(response){
                $('#dataTables-example').DataTable().ajax.reload(); 
                $("#myModal1").modal("hide");
                alert('Sửa Thành Công');
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        }); 
    });        
    </script>
@endsection