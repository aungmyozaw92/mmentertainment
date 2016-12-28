<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RoleRequest;

use App\Repositories\Admin\Role\RoleRepository;
use App\Repositories\Admin\Module\ModuleRepository;
use App\Repositories\Admin\Permission\PermissionRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    protected $role;
    protected $module;
    protected $permission;

      public function __construct(RoleRepository $role, ModuleRepository $module,PermissionRepository $permission)
    {
        $this->role       = $role;
        $this->module     = $module;
        $this->permission = $permission;
    }
    
    public function index()
    {
        if(!$this->permission->hasPermTo("role",'view'))return redirect('admin/error/show/403');
        return view('admin.role.index')->withRole($this->role->getAllRoles());
    }

    
    public function create()
    {
        if(!$this->permission->hasPermTo("role",'create'))return redirect('admin/error/show/403');
         return view('admin.role.create');
    }

    public function store(RoleRequest $request)
    {
        $this->role->create($request->all(),'role');
        Session::flash('message', 'Role has been added successfully');
        return redirect()->route('admin.role.index');
    }

    public function edit($id)
    {
        if(!$this->permission->hasPermTo("role",'edit'))return redirect('admin/error/show/403');
        $role = $this->role->findOrThrowException($id);

        return view('admin.role.edit')->withRole($role);

    }

    
    public function update(RoleRequest $request, $id)
    {
        $this->role->update($id, $request->all());
        Session::flash('message', 'Role has been updated successfully');
        return redirect()->route('admin.role.index');
    }

    public function show($id)
    {

        $permission = DB::table('permission')->where('role_id','=',$id)->get();
        $role       = $this->role->findOrThrowException($id);
        $module     = $this->module->getAllModules();

         $permissions_array = array();
         $modules_array     = array();
         foreach ($permission as $per) {
             array_push($permissions_array, $per->permission) ;
         }
         asort($permissions_array);

        foreach ($module as $mod){
            $modules_array[$mod->id] = $mod->name;
        }
        $modules = array_diff($modules_array,$permissions_array);

        return view('admin.role.detail',compact('modules','permission','role','module'));
    }

   
    public function destroy($id)
    {
        if(!$this->permission->hasPermTo("module",'delete'))return redirect('admin/error/show/403');
        $this->role->destroy($id);
        Session::flash('message', 'Role has been deleted successfully');
        return redirect()->route('admin.role.index');
    }

}
