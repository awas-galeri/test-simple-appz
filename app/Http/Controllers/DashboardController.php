<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = User::where('id', auth()->user()->id)->first();
        // $user = User::where('id', Auth::id())->get();
        $blog    = Blog::where('user_id', Auth::id())->get();
        $news    = News::where('user_id', Auth::id())->get();
        $user    = User::all();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'blogs' => $blog,
            'newses' => $news,
            'users' => $user
        ]);
    }
}
