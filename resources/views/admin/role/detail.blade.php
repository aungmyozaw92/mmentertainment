@extends('admin/layouts/default')
@section('content')
<script type="text/javascript">
$( document ).ready( function() {
    $('.savePerm').click(function(){
          var check_item =[];          
          $(':checkbox:checked').each(function(index,element){
               var id = $(this).parents('.module').find('.perm_id').val();
               var desc = $(this).val();               
               check_item[index] ={id: id , description: desc };               
          });            
          $.post('{{URL::to("/admin/permission/add_sub_permission")}}', {data : check_item , id4role : $('#id4role').val(),_token: '{!! csrf_token() !!}' }, function(data) {});
          $('#success').removeClass('hide');
          return false;
        });

        $('body').click(function(){
          $("#success").addClass('hide');
    });

    $('.remove-module').click(function(){
         if(confirm('You are about to delete')){
             $.ajax({
                type : 'GET',                        
                url : $(this).attr('src'),
                success : function(success){location.reload();}    
            });
             $(this).parents('.module').fadeOut('fast');
         }
     });
     
 } );

</script>
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <a href="{{URL::to('admin/role')}}">Home</a>
      <i class="fa fa-circle"></i>
    </li>
    <li>
      <span>Role</span>
    </li>
  </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> Role Management
 </h3>
 <!-- END PAGE TITLE-->
<div class="row">
  <div class="col-md-12 ">
    <!-- BEGIN Portlet PORTLET-->
    <div class="portlet box green-jungle">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-gift"></i>Role <small>List</small>
        </div>
        
      </div>
      <span class="hide" id="delete_text">
          <h4>Are you sure you want to Delete this Role ?</h4>
          <h4>This action can't be undo. </h4>
      </span>
      <div class="portlet-body">
        <div class="table-toolbar">
          <div class="row">
            
            <div id="success" class="alert alert-block alert-success hide">
              <strong> Changes have been saved ! </strong>
            </div>

            <div class="col-md-6">

               <h3>Change <a><?php   echo $role->description; ?></a> Permission</h3>  
               {!! Form::open(array( 'url' => 'admin/permission' , 'class'=>'form-horizontal')) !!}
                 <input type="hidden" name="id4role" id="id4role" value="<?php echo $role->id; ?>">
                 <?php 
                 use App\User;
                  foreach ($permission as $permission):
                       $perm     = $permission->permission;
                       $roleDesc = $role->name;
                 ?> 
                     <div class="row module">
                      <div class="col-md-10">
                         <input type="hidden" name="perm_id" class="perm_id" value="<?php echo $permission->id; ?>">
                          <br>
                            <legend><?php echo $permission->permission ?></legend>

                            <label for="view<?php echo $perm; ?>" class="checkbox checkbox-inline" >
                               <input id="view<?php echo $perm; ?>" <?php  User::roleHasPermTo($roleDesc,'view',$perm); ?> type="checkbox" name="descriptions[]" value="view_<?php  echo $perm; ?>" />
                               View
                            </label>

                            <label class="checkbox checkbox-inline" for="create<?php echo $perm; ?>">
                                <input id="create<?php echo $perm; ?>" <?php  User::roleHasPermTo($roleDesc,'create',$perm); ?> type="checkbox" name="descriptions[]" value="create_<?php  echo $perm; ?>" />
                                Create
                            </label> 
                        
                            <label class="checkbox checkbox-inline" for="edit<?php echo $perm; ?>">
                                <input id="edit<?php echo $perm; ?>" <?php  User::roleHasPermTo($roleDesc,'edit',$perm); ?> type="checkbox" name="descriptions[]" value="edit_<?php  echo $perm; ?>"  />
                                Edit
                            </label> 
                        
                            <label class="checkbox checkbox-inline" for="delete<?php echo $perm; ?>">
                                <input id="delete<?php echo $perm; ?>" <?php  User::roleHasPermTo($roleDesc,'delete',$perm); ?> type="checkbox" name="descriptions[]" value="delete_<?php  echo $perm; ?>"  />
                                Delete
                            </label>

            
                      </div>
                      <?php if(!($permission->permission == 'user' || $permission->permission == 'role'|| $permission->permission == 'module')) {?>
                      <div class="col-md-2">    <br>        
                         <a href="#" class="tooltips" data-placement="top" data-original-title="delete module">
                            <h5 class="remove-module" src="{{URL::to('admin/permission/delete/'.$permission->id)}}" ><i class="fa fa-remove"></i> Remove
                            </h5>
                         </a>
                      </div>
                      <?php } ?>
                    </div>
                <?php endforeach ?> 
                <br>
                <input type="button" rel="{{URL::to('/admin/permission/add_sub_permission')}}" class="savePerm btn blue" value="Save Changes">
              {{Form::close()}}

            </div>

            <div class="col-md-5">      
               {!! Form::open(array( 'url' => 'admin/permission' , 'class'=>'form-horizontal')) !!}
                    <legend>Add New Module to <a><?php echo $role->description; ?></a></legend>
                    <input type="hidden" name="role_id" value="<?php echo $role->id; ?>" />
                    <input type="hidden" name="current_roleDesc" value="<?php echo $role->description; ?>" />
                    <p class="col-md-8">
                     <select name="module" required class="form-control">
                       <?php foreach ($modules as $key => $value)
                           {
                             if($value == 'user' || $value == 'module'|| $value == 'role') {    }
                              else { ?>
                              <option value="<?php echo $value;?>"><?php echo $value;?></option>
                              <?php 
                       } } ?> 
                    </select>
                    </p>
                    <p class="col-md-4">
                      <button type="submit" class="btn red"><i class="fa fa-plus"></i>  Add New Permission</button>
                    </p>
                {!!Form::close()!!}
            </div>
           
          </div>
        </div>
       
      </div>
    </div>
      <!-- END Portlet PORTLET-->
  </div>
</div>
@stop