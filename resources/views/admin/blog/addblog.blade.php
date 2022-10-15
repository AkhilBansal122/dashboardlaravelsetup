@extends('layouts.admin')
@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">Add New Blog</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Blog</li>
			</ol>
		</div>
	</div>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
		<!-- basic table -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="border-bottom title-part-padding">
					    <h4 class="card-title mb-0">Add Blog</h4>             
					</div>
					<div class="card-body min_height">
					    <form class="row" id="blog_add_form" enctype="multipart/form-data"  action="javascript:void(0)" method="post">
							<div class="col-md-12 result">
						
								<!-- Alert Append Box -->
							
							</div>
							
							<div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Select Blog Category:<span style="color:red">*</span></label>
								<select class="form-control" required id="blog_category" name ="blog_category_id">
                                <option value="">Select Blog Category</option>    
                                @if(!empty($Blog_categories))
                                        @foreach($Blog_categories as $blogcat)
                                            <option value="{{$blogcat->id}}">{{$blogcat->name}}</option>
                                        @endforeach
                                     @endif
								</select>
							</div>
							<div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Blog Title:<span style="color:red">*</span></label>
								<input type="text" class="form-control" value="" id="blog_title" name="blog_title" required>
							</div>
							<div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Author Name:<span style="color:red">*</span></label>
								<input type="text" class="form-control" value="" id="author_name" name="author_name" required>
							</div>
							<div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Blog Publish Date:<span style="color:red">*</span></label>
								<input type="date" class="form-control" value="" id ="blog_public_date" required name="blog_public_date">
							</div>

                            <div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Blog Description:<span style="color:red">*</span></label>
								<textarea cols="80" id="blog_description" name="blog_description" rows="10" required data-sample="2" class="form-control"></textarea>

                            </div>
							<div class="mb-3 col-md-6">
								<div class="mb-3 col-md-6">
									<label for="recipient-name" class="control-label">Blog Image <small class="text-danger"><span style="color:red">*</span></small></label>
									<input class="form-control" type="file" id="formFile" name ="blogimage" required>
									<img id="imgPreview" height="100px"/>
								</div>
							</div>
                            <div class="col-md-12">
								<button type="submit" class="btn btn-success btn_submit fa-pull-right">Add Blog</button>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

<!-- This page plugin CSS -->
<link href="{{asset('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
<!--This page plugins -->
<script src="{{asset('/assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

<script>
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#blog_public_date').attr('min', minDate);
});

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