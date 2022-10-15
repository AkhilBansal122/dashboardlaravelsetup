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
            <h4 class="text-themecolor mb-0">Blog </h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Blog </li>
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
					    <h4 class="card-title mb-0">Blog List</h4>             
					</div>
					<div class="card-body">
						<div class="table-responsive">
						
						<div class="result">
						</div>
						
						
						    <div class="col-md-12">
								<a href="/addblogView" class="btn btn-success fa-pull-right btn-sm table_add_btn mx-2">Add Blog </a>
							</div>
							<table id="zero_config" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Blog Category</th>
										<th>Blog Title</th>
										<th>Author Name</th>
										<th>Blog Public Date</th>
										<th>Blog Description</th>
										<th>Blog Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @if(!empty($blog))
                                        @foreach($blog as $k=> $blog)
                                            <tr>
                                                <td>{{$k+1}}</td>
												<td>{{$blog->blog_category_name}}</td>
												<td>{{$blog->blog_title}}</td>
												<td>{{$blog->author_name}}</td>
												<td>{{$blog->blog_public_date}}</td>
												<td><textarea readonly>{{$blog->blog_description}}</textarea></td>
												<td><img height="100px" src="{{url('/')}}{{$blog->blogimage}}"></td>
                                                <td>

                                                <td><div class="table_action">
												<a href="javascript:void(0)"
													data-id = "{{$blog->id}}"
													data-blog_category_id = "{{$blog->blog_category_id}}"
													data-author_name = "{{$blog->author_name}}"
													data-blog_title = "{{$blog->blog_title}}"
													data-blog_public_date = "{{$blog->blog_public_date}}"
													data-blog_description = "{{$blog->blog_description}}"
													data-blogimage = "{{$blog->blogimage}}"
													data-blog_categorylist ={{$blog_categories}}
												class="btn btn-info btn-sm list_edit edit_blog_" 
                                                >
													<i class="mdi mdi-lead-pencil"></i>
												</a> 
											    <a href="{{ route('blog_del', $blog->id) }}" onclick="return confirm('Are you sure delete this blog ？')" class="btn btn-danger btn-sm list_delete">
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

	<!-- Add Blog Modal -->
<div class="modal fade" id="edit_blog_modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Blog </h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
            <form id="blog_edit_form" method="POST" action="javascript:void(0)" enctype="multipart/form-data">

			    <div class="modal-body">
					<div class ="row"> 
			  		<div class="mb-3 col-md-6">
						<label for="recipient-name" class="control-label">Blog Category Name:</label>
						<select name="blog_category_id" required class="form-control" id="blog_category_id">
						</select>
						<input type="hidden" name="id"  id="id"/>
					</div>

					<div class="mb-3 col-md-6">
						<label for="recipient-name" class="control-label">Blog Title:</label>
						<input type="text" name="blog_title" required class="form-control" id="blog_title"/>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col-md-6">
						<label for="recipient-name" class="control-label">Blog Author Name:</label>
						<input type="text" name="author_name" required class="form-control" id="author_name"/>
					</div>
					<div class="mb-3 col-md-6">
						<label for="recipient-name" class="control-label">Blog Publish Date:<span style="color:red">*</span></label>
						<input type="date" class="form-control"  id ="Blog_public_date"  required name="blog_public_date">
					</div>
</div>
					<div class="mb-6">
					<label for="recipient-name" class="control-label" id="blog_description">Blog Description:<span style="color:red">*</span></label>
					
					</div>
					<div class="mb-3 col-md-6">
						<div class="mb-3 col-md-6">
									<label for="recipient-name" class="control-label">Blog Image <small class="text-danger"><span style="color:red">*</span></small></label>
									<input class="form-control" type="file" id="formFile" name ="blogimage" >
                                    <input type="hidden" id="oldblogimage" name="oldblogimage"/>
                                   
                                    <img id="imgPreview"  height="100px"/>
                                    
                                </div>
							</div>
					
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success btn_submit">Save Blog</button>
			</div>
            </form>
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
 	$(".edit_blog_").on("click",function(e){
		e.preventDefault();
		$("#edit_blog_modal").modal("toggle");
        id = $(this).data("id");
		$("#id").val(id);
        blog_category_id = $(this).data("blog_category_id");
        author_name = $(this).data("author_name");
        blog_title = $(this).data("blog_title");
		$("#blog_title").val(blog_title);
		$("#author_name").val(author_name);
        blog_public_date = $(this).data("blog_public_date");
		$("#Blog_public_date").val(blog_public_date);
        blog_description = $(this).data("blog_description");
		textareavala = '<label for="recipient-name" class="control-label" id="blog_description">Blog Description:<span style="color:red">*</span></label><textarea cols="80" id="Blog_description" name="blog_description" rows="10" required data-sample="2" class="form-control">'+blog_description+'</textarea>';
		$("#blog_description").empty("");	
		$("#blog_description").append(textareavala);	
        blogimage = $(this).data("blogimage");
		$("#oldblogimage").val(blogimage);
		imgurl = @json(url('/'))+blogimage;
		console.log(imgurl);
		$("#imgPreview").attr("src",imgurl);
        blog_categorylist = $(this).data("blog_categorylist");
		$("#blog_id").val(id);
       	blog_category = "";
        for(index in blog_categorylist)
        {
			if(blog_category_id==blog_categorylist[index].id)
			{
				blog_category+="<option selected value='"+blog_categorylist[index].id+"'>"+blog_categorylist[index].name+"</option>";
			}
			else{
				blog_category+="<option value='"+blog_categorylist[index].id+"'>"+blog_categorylist[index].name+"</option>";
			}
        }
        $("#blog_category_id").append(blog_category);

	});

    $(".switch-input").on("change",function(){
        id = $(this).data("id");
        status = $(this).data("status");
        $.ajax({
				type: "POST",
				dataType: "json",
				url:'blog_status',
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
	$('#formFile').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    </script>
@stop
