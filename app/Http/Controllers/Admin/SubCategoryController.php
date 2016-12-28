<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SubCategoryRequest;

use App\Repositories\Admin\SubCategory\SubCategoryRepository;
use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Module\ModuleRepository;
use App\Repositories\Admin\Permission\PermissionRepository;

use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    protected $subcategory;
    protected $category;
    protected $module;
    protected $permission;

      public function __construct(SubCategoryRepository $subcategory,CategoryRepository $category, ModuleRepository $module,PermissionRepository $permission)
    {
        $this->subcategory    = $subcategory;
        $this->category       = $category;
        $this->module         = $module;
        $this->permission     = $permission;
    }
    
    public function index()
    {
        if(!$this->permission->hasPermTo("subcategory",'view'))return redirect('admin/error/show/403');
        return view('admin.subcategory.index')->withSubcategory($this->subcategory->getAllSubCategorys());
    }

    
    public function create()
    {
        if(!$this->permission->hasPermTo("subcategory",'create'))return redirect('admin/error/show/403');
         return view('admin.subcategory.create')->withCategory($this->category->getAllCategorys());
    }

    public function store(SubCategoryRequest $request)
    {
        $this->subcategory->create($request->all(),'subcategory');
        Session::flash('message', 'Sub Category has been added successfully');
        return redirect()->route('admin.subcategory.index');
    }

    public function edit($id)
    {
        if(!$this->permission->hasPermTo("subcategory",'edit'))return redirect('admin/error/show/403');
        $subcategory = $this->subcategory->findOrThrowException($id);

        return view('admin.subcategory.edit')->withSubcategory($subcategory)->withCategory($this->category->getAllCategorys());

    }

    
    public function update(SubCategoryRequest $request, $id)
    {
        $this->subcategory->update($id, $request->all());
        Session::flash('message', 'Sub Category has been updated successfully');
        return redirect()->route('admin.subcategory.index');
    }

    public function show($id)
    {
 
    }

   
    public function destroy($id)
    {
        if(!$this->permission->hasPermTo("module",'delete'))return redirect('admin/error/show/403');
        $this->subcategory->destroy($id);
        Session::flash('message', 'Sub Category has been deleted successfully');
        return redirect()->route('admin.subcategory.index');
    }
}
