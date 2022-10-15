@extends('layouts.admin')
@section('content')
<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">Blog Category</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Blog Category</li>
			</ol>
		</div>
	</div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
		<!-- basic table -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="border-bottom title-part-padding">
					    <h4 class="card-title mb-0">Blog Category List</h4>             
					</div>
					<div class="card-body">
						<div class="table-responsive">
						
						<div class="result">
						</div>
						
						
						    <div class="col-md-12">
								<a href="javascript:void(0);" class="btn btn-success fa-pull-right btn-sm table_add_btn mx-2" id="addcategorymodal"  >Add Blog Category</a>
							</div>
							<table id="zero_config" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Blog Category Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @if(!empty($blogcategory))
                                        @foreach($blogcategory as $k=> $blog)
                                            <tr>
                                                <td>{{$k+1}}</td>
                                                <td>
                                                <div class="blog_dtls_row">
												<p class="limit_1">{{$blog->name}}</p> 
											</div></td>
                                                <td><div class="table_action">
												<a href="javascript:void(0);" class="btn btn-info btn-sm list_edit edit_blog_category" 
                                                data-id = "{{$blog->id}}" data-name = "{{$blog->name}}"
                                                >
													<i class="mdi mdi-lead-pencil"></i>
												</a> 
											    <a href="{{ route('blogcategory_del', $blog->id) }}" onclick="return confirm('Are you sure delete this category？')" class="btn btn-danger btn-sm list_delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a> 
												<span class="status">
													<label class="switch">
                                                    @if($blog->status==1)
														<input data-id="{{$blog->id}}" class="switch-input" data-status ="0" data-id="{{$blog->id}}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked >
														<span class="switch-label" data-on="Active" data-off="Deactive"></span> 
														<span class="switch-handle"></span> 
														@else
														<input data-id="{{$blog->id}}" class="switch-input"  data-status ="1" data-id ="{{$blog->id]}" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Deactive" data-off="InActive" >
														<span class="switch-label" data-on="Active" data-off="Deactive"></span> 
														<span class="switch-handle"></span> 
														@endif
													</label>
												</span>
                                                
											</div>
                                        </td>
                                        </tr>
                                        @endforeach
                                    @endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


<!-- This page plugin CSS -->
<link href="assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/admin/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
<!--This page plugins -->
<script src="assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="assets/admin/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script>
    $(".switch-input").on("change",function(){
        id = $(this).data("id");
        status = $(this).data("status");
       // status = $(this).prop('checked') == true ? 1 : 0;
        $.ajax({
				type: "POST",
				dataType: "json",
				url:'blogcategory_status',
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
				data: {'status': status, 'id': id},
				success: function(data){
				//	var obj = JSON.parse(data);
			
					if(data.status==true)
					{
						jQuery('.result').html("<div class='alert alert-success alert-dismissible text-white border-0 fade show' role='alert'><button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button><strong>Success - </strong> "+data.message+"</div>");

						 setTimeout(function(){
					  jQuery('.result').html('');
					  window.location.reload();
				  }, 3000);
					}
				 
				}
			});
    })
    </script>



<!-- Add Blog Modal -->
<div class="modal fade" id="add_blog_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="exampleModalLabel1">Add Blog Category</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
            <form id="addblogcategoryform" method="POST" action="javascript:void(0)">

			    <div class="modal-body">
			  		<div class="mb-3">
						<label for="recipient-name" class="control-label">Blog Category Name:</label>
						<input type="text" name="name" required class="form-control" id="recipient-name1">
					</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success btn_submit">Add Blog Category</button>
			</div>
            </form>
		</div>
	</div>
</div>


<div class="modal fade" id="edit_blog_category_modal" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Blog Category</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
            <form id="editblogcategoryform" action="javascript:void(0)">
           <div class="modal-body">
			        <input type="hidden" id ="id" name="id"/>
					<div class="mb-3">
						<label for="recipient-name" class="control-label">Blog Category Name:</label>
						<input type="text" class="form-control" name="name" id="editname" value="">
					</div>
			
			</div>

			<div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success btn_submit">Edit Blog Category</button>
			</div>
            </form>
		</div>
	</div>
</div>
@stop
