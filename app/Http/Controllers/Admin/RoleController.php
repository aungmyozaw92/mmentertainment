<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RoleRequest;

use App\Repositories\Admin\Role\RoleRepository;
//use App\Repositories\Admin\Module\ModuleRepository;
//use App\Repositories\Admin\Permission\PermissionRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    protected $role;
   // protected $module;
   // protected $permission;

    public function __construct(RoleRepository $role)
    {
        $this->role       = $role;
        //$this->module     = $module;
        //$this->permission = $permission;
    }
    
    public function index()
    {
        //if(!$this->permission->hasPermTo("role",'view'))return redirect('admin/error/show/403');
        return view('admin.role.index')->withRole($this->role->getAllRoles());
    }

    
    public function create()
    {
        //if(!$this->permission->hasPermTo("role",'create'))return redirect('admin/error/show/403');
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
        //if(!$this->permission->hasPermTo("role",'edit'))return redirect('admin/error/show/403');
        $role = $this->role->findOrThrowException($id);

        return view('admin.role.edit')->withRole($role);

    }

    
    public function update(RoleRequest $request, $id)
    {
        //$this->role->update($id, $request->all());
        Session::flash('message', 'Role has been updated successfully');
        return redirect()->route('admin.role.index');
    }

    public function show($id)
    {

        
    }

   
    public function destroy($id)
    {
        //if(!$this->permission->hasPermTo("module",'delete'))return redirect('admin/error/show/403');
        $this->role->destroy($id);
        Session::flash('message', 'Role has been deleted successfully');
        return redirect()->route('admin.role.index');
    }

}
