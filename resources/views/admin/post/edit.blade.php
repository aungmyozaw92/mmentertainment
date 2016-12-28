@extends('admin/layouts/default')
@section('content')
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{URL::to('admin')}}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
        <a href="{{URL::to('admin/category')}}">Category</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> Category Management</h3>
 <!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="direction"></i>Edit Category
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                    <div class="form-body">
                        <div class="form-group @if ($errors->has('name'))has-error @endif">
                            {!!Form::label('name', 'Category Name:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('name', null, ['class' => 'form-control', 'value' => '{{$category->name}}' ])!!} 
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block"> {{ $error }}</span>
                                @endforeach 
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('name', 'MM Language Name:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-5">
                                {!! Form::text('mm_name', null, ['class' => 'form-control', 'value' => '{{$category->mm_name}}' ])!!}
                                @foreach($errors->get('mm_name') as $error)
                                    <span class="help-block"> {{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn yellow-casablanca">Submit</button>
                                <button type="button" id="back" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
@stop