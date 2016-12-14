<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ModuleRequest;

use App\Repositories\Admin\Module\ModuleRepository;
//use App\Repositories\Admin\Permission\PermissionRepository;

use Illuminate\Support\Facades\Session;

class ModuleController extends Controller
{
    protected $module;
    //protected $permission;

    public function __construct(ModuleRepository $module)
    {
        $this->module     = $module;
    }
    
    public function index()
    {
        return view('admin.module.index')->withModule($this->module->getAllModules());
    }

    
    public function create()
    {
         return view('admin.module.create');
    }

    public function store(ModuleRequest $request)
    {
        $this->module->create($request->all(),'module');
        Session::flash('message', 'Module has been added successfully');
        return redirect()->route('admin.module.index');
    }

    public function edit($id)
    {
        $module = $this->module->findOrThrowException($id);

        return view('admin.module.edit')->withModule($module);

    }

    
    public function update(ModuleRequest $request, $id)
    {
        $this->module->update($id, $request->all());
         Session::flash('message', 'Module has been updated successfully');
        return redirect()->route('admin.module.index');
    }

   
    public function destroy($id)
    {
        $this->module->destroy($id);
        Session::flash('message', 'Module has been deleted successfully');
        return redirect()->route('admin.module.index');
    }
}
