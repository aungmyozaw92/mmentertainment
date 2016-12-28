<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Permission extends Model
{
    protected $table = 'permission';

    public static function getPermissionByRole($id,$field=NULL)
	{		
		if (is_null($field)) {
			return DB::table('permission')->where('role_id','=',$id)->get() ;
		}else{
			return DB::table('permission')->select($id)->where('role_id',$id)->get();
		}
		
	}	
}
