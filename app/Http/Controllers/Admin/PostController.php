<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
     public function index()
    {
        if(!$this->permission->hasPermTo("post",'view'))return redirect('admin/error/show/403');
        return view('admin.post.index')->withPost($this->post->getAllPosts());
    }

}
