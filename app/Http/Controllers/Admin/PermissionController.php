<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Admin\Permission\PermissionRepository;
use Session;

class PermissionController extends Controller
{
	protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    public function index()
	{
		$permissions=$this->permission->get_permission_list();
		$this->view('permission.view',compact('permission'));
	}

	public function store(Request $request)
	{
		$count  =  $this->permission->isPermDuplicate($request->all());
		if($count==0){
			$this->permission->add_permission($request->all());
			return redirect('admin/role/'.$request->role_id);
		}
		else{
			Session::flash('msg', 'Role Duplicate');
			return redirect('admin/role/'.$request->role_id);
			
		}
	}

	public function add_sub_permission(Request $request){
		$this->permission->add_sub_permission($request);
	}

	public function delete($id)
    {
       $this->permission->destroy($id);
    }

}
