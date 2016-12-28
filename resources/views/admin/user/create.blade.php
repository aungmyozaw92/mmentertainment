@extends('admin/layouts/default')
@section('content')
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{URL::to('admin')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
        <a href="{{URL::to('admin/user')}}">User</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Add New</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> User Management</h3>
 <!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box red-mint">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user"></i>Add New User
                </div>
               
            </div>
            <div class="portlet-body form">
                {!! Form::open(array( 'url' => 'admin/user' , 'class'=>'form-horizontal')) !!} 

                    <div class="form-body">
                        <div class="form-group @if ($errors->has('name'))has-error @endif">
                            {!!Form::label('name', 'Name:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name' ])!!} 
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block"> {{ $error }}</span>
                                @endforeach 
                            </div>
                        </div>
                        

                        <div class="form-group @if ($errors->has('username'))has-error @endif">
                            {!!Form::label('name', 'Username:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-3">
                                <div class="input-inline input-large">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Enter Username' ])!!}
                                        @foreach($errors->get('username') as $error)
                                           <span class="help-block"> {{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div> 
                        </div>

                        <div class="form-group @if ($errors->has('email'))has-error @endif">
                            {!!Form::label('name', 'Email:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-5">
                                <div class="input-inline input-large">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email' ])!!}
                                        @foreach($errors->get('email') as $error)
                                            <span class="help-block"> {{ $error }}</span>
                                        @endforeach 
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
    
                        <div class="form-group @if ($errors->has('password'))has-error @endif">
                            {!!Form::label('name', 'Password:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-3">
                                <div class="input-inline input-large">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" placeholder="Password" name="password" class="form-control"/>
                                        @foreach($errors->get('password') as $error)
                                            <span class="help-block"> {{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                 
                            </div>
                            
                        </div>
                        <div class="form-group @if ($errors->has('passconf'))has-error @endif">
                            {!!Form::label('name', 'Comfirmation Password:',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" placeholder="must same above password field" name="passconf" class="form-control"/>
                                    @foreach($errors->get('passconf') as $error)
                                       <span class="help-block"> {{ $error }}</span>
                                    @endforeach 
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="form-group @if ($errors->has('role_id'))has-error @endif" >
                            <label class="control-label col-md-3">Select</label>
                            <div class="col-md-3">
                                <select name="role_id" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                                    @endforeach
                                </select>
                                @foreach($errors->get('role_id') as $error)
                                   <span class="help-block"> {{ $error }}</span>
                                @endforeach 
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn red-mint">Submit</button>
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