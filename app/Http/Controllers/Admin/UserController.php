<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;

use App\Repositories\Admin\User\UserRepository;
use App\Repositories\Admin\Role\RoleRepository;

class UserController extends Controller
{
     protected $user;
     protected $role;

    public function __construct(UserRepository $user,RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    
    public function index()
    {
        return view('admin.user.index')->withUser($this->user->getAllUsers());
    }

   public function create()
    {
         return view('admin.user.create')
                ->withroles($this->role->getAllRoles());
    }

    public function store(UserRequest $request)
    {
        $this->user->create($request->all(),'user');
        Session::flash('message', 'User has been added successfully');
        return redirect()->route('admin.user.index');
    }

    public function edit($id,Request $request)
    {
        $user = $this->user->findOrThrowException($id);
       // $active = ($request->input('active_tab'))?$request->input('active_tab'):Session::get('active');
        return view('admin.user.edit')->withUser($user)                                     
                                      ->withroles($this->role->getAllRoles());

    }

    
    public function update(UserEditRequest $request, $id)
    {
        $this->user->update($id, $request->all());
        Session::flash('message', 'User has been edited successfully');
        return redirect()->route('admin.user.index');
    }

   
    public function destroy($id)
    {
       $this->user->destroy($id);
       Session::flash('message', 'User has been deleted successfully');
        return redirect()->route('admin.user.index');
    }

}
