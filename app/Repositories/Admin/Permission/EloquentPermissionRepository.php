<?php 
namespace App\Repositories\Admin\Permission;

use App\Models\Permission;
use App\Models\Role;
use Session;
use DB;
use Auth;

class EloquentPermissionRepository implements PermissionRepository
{

    public function isPermDuplicate($input)
    {
        $role_id  = $input['role_id'];
        $module   = $input['module'];
        $count    = Permission::where('role_id','=',$role_id)->where('permission','=',$module)->count();
        if($count == 0){
            return 0;
        }
        else {
            return 1;
        }

    }

    public function add_permission($input)
    {
        $permission          = new Permission;
        $permission->role_id = $input['role_id'];
        $permission->permission  = $input['module'];
        $permission->save();
        return true;
    }

    public function add_sub_permission($input)
    {
        $role       = $input['id4role'];
        $perm_array = $input['data'];
        $permissions= Permission::getPermissionByRole($role);

            foreach ($permissions as $perm) {
                if(DB::table('sub_permissions')->where('perm_id',$perm->id)->count()>0)
                    DB::table('sub_permissions')->where('perm_id',$perm->id)->delete();
            }

            foreach($perm_array as $perm_data){
                DB::table('sub_permissions')->insert(array(
                      'perm_id'     => $perm_data['id'],
                      'description' => $perm_data['description']
                      )
                );
            }
        return true;
    }

     public function hasPermTo($module_name , $perm_name = false)
    {   

        $role_id          = Auth::user()->role_id;
        $rolePermObj      = Session::get('rolePermObj');
        $cur_usr_desc     = Role::where('id','=',$role_id)->first()->name;
        $var['role_desc'] = $rolePermObj[$cur_usr_desc];
        foreach ($var as $key => $module) {
                if ($perm_name) {
                $perm_name = $perm_name.'_'.$module_name;
                return  isset($module[$module_name][$perm_name]);
            }else{
                return  isset($module[$module_name]);
            }   
        }
    }

    public function destroy($id)
    {
        DB::table('sub_permissions')->where('perm_id',$id)->delete();
        $module = Permission::where('id', '=', $id)->first();
        if ($module->delete()) {
           return true;
        }

    }
    
}


?>