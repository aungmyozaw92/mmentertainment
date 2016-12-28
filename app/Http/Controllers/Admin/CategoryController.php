<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;

use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Module\ModuleRepository;
use App\Repositories\Admin\Permission\PermissionRepository;

use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $category;
    protected $module;
    protected $permission;

      public function __construct(CategoryRepository $category, ModuleRepository $module,PermissionRepository $permission)
    {
        $this->category       = $category;
        $this->module         = $module;
        $this->permission     = $permission;
    }
    
    public function index()
    {
        if(!$this->permission->hasPermTo("category",'view'))return redirect('admin/error/show/403');
        return view('admin.category.index')->withCategory($this->category->getAllCategorys());
    }

    
    public function create()
    {
        if(!$this->permission->hasPermTo("category",'create'))return redirect('admin/error/show/403');
         return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->category->create($request->all(),'category');
        Session::flash('message', 'Category has been added successfully');
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        if(!$this->permission->hasPermTo("category",'edit'))return redirect('admin/error/show/403');
        $category = $this->category->findOrThrowException($id);

        return view('admin.category.edit')->withCategory($category);

    }

    
    public function update(CategoryRequest $request, $id)
    {
        $this->category->update($id, $request->all());
        Session::flash('message', 'Category has been updated successfully');
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
 
    }

   
    public function destroy($id)
    {
        if(!$this->permission->hasPermTo("module",'delete'))return redirect('admin/error/show/403');
        $this->category->destroy($id);
        Session::flash('message', 'Category has been deleted successfully');
        return redirect()->route('admin.category.index');
    }
}
