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
        <a href="{{URL::to('admin/subcategory')}}">Sub Category</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> Sub Category Management</h3>
 <!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box dark">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-directions"></i>Edit Sub Category
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::model($subcategory, ['route' => ['admin.subcategory.update', $subcategory->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                    <div class="form-body">
                        <div class="form-group @if ($errors->has('name'))has-error @endif">
                            {!!Form::label('name', 'Sub Category Name:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('name', null, ['class' => 'form-control', 'value' => '{{$subcategory->name}}' ])!!} 
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block"> {{ $error }}</span>
                                @endforeach 
                            </div>
                        </div>
                        <div class="form-group @if ($errors->has('mm_name'))has-error @endif">
                            {!!Form::label('name', 'MM Language Name:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-5">
                                {!! Form::text('mm_name', null, ['class' => 'form-control', 'value' => '{{$subcategory->mm_name}}' ])!!}
                                @foreach($errors->get('mm_name') as $error)
                                    <span class="help-block"> {{ $error }}</span>
                                @endforeach
                            </div>
                        </div>

                         <div class="form-group @if ($errors->has('category_id'))has-error @endif" >
                                    <label class="control-label col-md-3">Select Category</label>
                                    <div class="col-md-3">
                                        <select name="category_id" class="form-control">
                                            <option value="">Select  Category</option>
                                            @foreach ($category as $category)
                                            <option {!! ($category->id == $subcategory->category_id)?'selected':'' !!} value="{!! $category->id !!}">{!! $category->name !!}</option>
                                            @endforeach

                                        </select>
                                        @foreach($errors->get('category_id') as $error)
                                        <span class="help-block"> {{ $error }}</span>
                                        @endforeach 
                                    </div>
                                </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn dark">Submit</button>
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