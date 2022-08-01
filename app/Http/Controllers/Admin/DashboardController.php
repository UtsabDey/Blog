<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $data['category'] = Category::count();
        $data['post'] = Post::count();
        $data['user'] = User::where('role_as','0')->count();
        $data['admin'] = User::where('role_as','1')->count();
        return view('admin.dashboard', $data);
    }

}
