@extends('admin/layouts/default')
@section('content')
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
 	<ul class="page-breadcrumb">
 		<li>
 			<a href="{{URL::to('admin/user')}}">Home</a>
 			<i class="fa fa-angle-right"></i>
 		</li>
 		<li>
 			<span>User</span>
 		</li>
 	</ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> User Management
 </h3>
 <!-- END PAGE TITLE-->
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet box red-mint">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>User <small>List</small>
				</div>
				
			</div>
			<span class="hide" id="delete_text">
		    	<h4>Are you sure you want to Delete this User ?</h4>
		    	<h4>This action can't be undo. </h4>
			</span>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a class="btn red-mint" href="{{URL::to('admin/user/create')}}"> Add New </a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="btn-group pull-right">
								<button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
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
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i=0; ?>
                    @foreach ($user as $row)
                    <tr class="odd gradeX">
						<td>{!! ++$i !!}</td>
                        <td>{!! $row->name !!}</td>
                        <td>{!! $row->username !!}</td>
                        <td>{!! $row->email !!}</td>
                        <td>{!! $row->role->name !!}</td>
                        <td>{!! date('d-m-Y', strtotime($row->updated_at)) !!}</td>

                    	<td>
						<a href="{{ URL::to('admin/user/'.$row->id.'/edit/') }}" class="btn blue tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil icon-white"></i></a>

                    	@if($row->id != 1)
                    		{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.user.destroy', $row->id), 'style'=>'display: inline')) }}
                    		<button type="button" class="btn red tooltips delete" value="x" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o icon-white"></i></button>
                    	    {{ Form::close() }}
                    	@endif
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