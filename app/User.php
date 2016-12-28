<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Session;
use App\Models\Permission;
use App\Models\Role;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public static function getPerm($role_id)
    {       
        $permissions = array();
        $perms       = Permission::where('role_id','=',$role_id)->get();

        foreach ($perms as $perm) {
            $permissions[$perm->permission] = static::assignPerm($perm->id);
        }
        return $permissions;
    }

    public static function assignPerm($perm_id)
    {
        $sub_perm_array = array();
        $sub_perms = DB::table('sub_permissions')->where('perm_id',$perm_id)->get();

        foreach ($sub_perms as $sub_perm) {
            $sub_perm_array[$sub_perm->description] = true;
        }
        return $sub_perm_array;     
    }

    public static function roleHasPermTo($role,$perm_text,$module)
    {

        $perm_text      = $perm_text.'_'.$module;

        $rolePermObj    = Session::get('rolePermObj');
        $var['role_id'] = $rolePermObj[$role];
    
        foreach ($var as $key => $perm) {
 
            echo (isset($perm[$module][$perm_text]))? 'checked':'';
        }

    }

    public static function initRolePerm()
    {
        $roles       = Role::all();
        $rolePermObj = array();
        foreach ($roles as $role) {
            $rolePermObj[$role->name] = static::getPerm($role->id);
        }

        Session::put('rolePermObj',$rolePermObj);

    }
}
