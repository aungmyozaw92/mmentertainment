@extends('admin/layouts/default')
@section('content')
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
 	<ul class="page-breadcrumb">
 		<li>
 			<a href="{{URL::to('admin/subcategory')}}">Home</a>
 			<i class="fa fa-circle"></i>
 		</li>
 		<li>
 			<span>SubCategory</span>
 		</li>
 	</ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> SubCategory Management
 </h3>
 <!-- END PAGE TITLE-->
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet box dark">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-directions"></i>SubCategory <small>List</small>
				</div>
				
			</div>
			<span class="hide" id="delete_text">
		    	<h4>Are you sure you want to Delete this SubCategory ?</h4>
		    	<h4>This action can't be undo. </h4>
			</span>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a class="btn dark" href="{{URL::to('admin/subcategory/create')}}"> Add New </a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="btn-group pull-right">
								<button class="btn dark  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu pull-right">
									<li>
										<a href="javascript:;">
											<i class="fa fa-print"></i> Print </a>
									</li>
									<li>
										<a href="javascript:;">
											<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
									</li>
									<li>
										<a href="javascript:;">
										     <i class="fa fa-file-excel-o"></i> Export to Excel </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> SubCategory Name </th>
                            <th> MM SubCategory Name </th>
                            <th> Category Name </th>
                     		<th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i=0; ?>
                    @foreach ($subcategory as $row)
                    <tr class="odd gradeX">
						<td> {!! ++$i !!} </td>
                    	<td> {!! $row->name !!} </td>
                    	<td> {!! $row->mm_name !!} </td>
						<td> {!! $row->category->name !!} </td>
                    	<td>
                    	
                    		<a href="{{ URL::to('admin/subcategory/'.$row->id.'/edit/') }}" class="btn blue tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil icon-white"></i></a>

                    		{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.subcategory.destroy', $row->id), 'style'=>'display: inline')) }}
                    		<button type="button" class="btn red tooltips delete" value="x" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o icon-white"></i></button>
                    		{{ Form::close() }}
                    	</td>
                    </tr>
                     @endforeach
                    </tbody>
                </table>
			</div>
		</div>
			<!-- END Portlet PORTLET-->
	</div>
</div>
@stop