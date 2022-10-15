@extends('layouts.admin')
@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">Add New Services</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Services</li>
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
					    <h4 class="card-title mb-0">Add Services</h4>             
					</div>
					<div class="card-body min_height">
					    <form class="row" id="Services_add_form" enctype="multipart/form-data"  action="javascript:void(0)" method="post">
							<div class="col-md-12 result">
							</div>

							<input type="hidden" name="type" value="service_add" id="type"/>
							<div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Services Name:<span style="color:red">*</span></label>
								<input type="text" class="form-control" value="" id="name" name="name" required>
							</div>

                            <div class="mb-3 col-md-6">
								<label for="recipient-name" class="control-label">Services Description:<span style="color:red">*</span></label>
								<textarea cols="80" id="description" name="description" rows="10" required data-sample="2" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
								<button type="submit" class="btn btn-success btn_submit fa-pull-right">Add Services</button>  
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


@stop