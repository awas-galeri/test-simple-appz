<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $user = auth()->user();
        return view('home', [
            'title' => 'Home',
            'active' => 'home',
            'user' => $user
        ]);
    }

    public function blog()
    {
        $user = auth()->user();
        return view('blog', [
            'title' => 'Blog Page',
            'active' => 'blog-project',
            'index' => '',
            'users' => $user,
            // 'blogs' => Blog::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get()
            'blogs' => Blog::latest()->filter(request(['search']))->paginate(7)->withQueryString()
        ]);
    }

    public function news()
    {
        return view('news', [
            'title' => 'News Page',
            'active' => 'news-project',
            'index' => '',
            'newses' => News::latest()->filter(request(['search']))->paginate(7)->withQueryString()
        ]);
    }

    public function movies()
    {
        return view('movies', [
            'title' => 'Movies',
            'active' => 'movies',
            'index' => 'movies'
        ]);
    }

    public function movie()
    {
        return view('dashboard.movies.index', [
            'title' => 'Movie',
            'active' => 'movie',
            'index' => 'movie'
        ]);
    }

    public function users()
    {
        $user = User::orderBy('name', 'asc')->filter(request(['search']))->paginate(10)->withQueryString();
        // $blogs = [];
        // foreach ($user as $u) {
        //     $blog = Blog::where('user_id', $u->id)->get();
        //     array_push($blogs, $blog);
        // }
        // $user = User::all();
        $blog = Blog::get();
        $news = News::get();
        return view('users', [
            'title' => 'Users Page',
            'active' => 'users-page',
            'index' => '',
            'users' => $user,
            'blogs' => $blog,
            'newses' => $news
        ]);
    }
}
