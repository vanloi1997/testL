@extends('layout.index')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header modalll">Loại Tin
                            <small> Danh Sách</small>
                            <button onclick="LoadDataTL()" data-toggle="modal" type="button" class="create_ca btn btn-success"><a style="text-decoration:none">Thêm Mới</a></button>
                        </h1>
                        
                    </div>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Thêm Loại Tin</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Thông báo công việc đã được thực hiện -->
                            @if(session('message'))
                                <div class="alert alert-success">
                                    <strong>{{session('message')}}</strong>
                                </div>
                            @endif
                                    <div class="form-group">
                                        <p><label>Tên Thể Loại</label></p>
                                        <select  class="form-control" name="" style="width:226px" id="txtNameTL"></select>
                                    </div>
                                    <div class="form-group">
                                        <p><label>Nhập Tên Loại Tin</label></p>
                                        <input class="form-control input-width" name="cate_name" id="txtNameLT" placeholder="Nhập tên Loại Tin.." />
                                    </div>
                                    
                                    <button  type="button" class="btn btn-default" id="addloaitin">Thêm</button>

                                    
                                   
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Thể Loại</th>
                                <th class="text-center">Tên Loại Tin</th>
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
                                     <div style="text-align: left;" id="myModal1" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                       <input type="text" id="txtidoxa"/>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="theloai" onclick="Xoatheloai()"  class="btn btn-default btnConf">Có</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

@endsection


@section('script')
<script>
        $("#addloaitin").click(function() {
        var name1 = $('#txtNameLT').val();
        var name2 = $('#txtNameTL').val();
        $.ajax({
            method: 'POST', 
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'loaitin/danhsach',
            data: {'ten' : name,_token: '{{csrf_token()}}'},
            success: function(response){
                $('#dataTables-example2').DataTable().ajax.reload(); 
                $("#myModal").modal("hide");
                alert('Thêm Thành Công');
                //set value placeholder jquery
                $("#txtName").val("");
                $("#txtName").attr("placeholder","Nhập Tên Loại Tin..");
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        }); 
    });  

    function LoadDataTL(){
        $("#myModal").modal("show");
        $.ajax({
            method: 'GET', 
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'loaitin/getTL',
            success: function(response){
                var obj = JSON.parse(response);
                console.log(obj);
                var html ='';
                $.each(obj,function(key,value){
                    html +="<option value="">name<option>"
                });
                $('').append(html);
                // $.each(selectValues, function(key, value) {   
                //     $('#mySelect').append($("<option></option>").attr("value",key).text(value)); 
                // });
            },              
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        }); 
    }      
</script>
@endsection