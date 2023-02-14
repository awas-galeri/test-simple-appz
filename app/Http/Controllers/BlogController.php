<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function page()
    {
        return view('dashboard.blog.page', [
            'title' => 'Blog Page',
            'active' => 'blog-page',
            'index' => 'blog',
            // 'users' => User::where('id', Auth::id())->get(),
            'blogs' => Blog::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function json(Request $request)
    {
        return DataTables::of(Blog::where('user_id', Auth::id()))->make(true);
    }

    public function index()
    {
        return view('dashboard.blog.index', [
            'title' => 'Blog',
            'active' => 'blog',
            'users' => User::where('id', Auth::id())->get(),
            // 'blogs' => Blog::where('user_id', Auth::id())->get()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $blog = Blog::find($id);
        // $blog   = Blog::where('id', $request->id)->first();

        return view('dashboard.blog.edit', [
            'title' => 'Edit Blog',
            'active' => 'blog',
            'blogs' => $blog
        ]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        // dd($blog);
        if (!$blog) {
            return redirect()->back();
        }

        $blog->title     = $request->title;
        $blog->excerpt   = $request->excerpt;
        $blog->body      = $request->body;
        $blog->save();

        // dd($blog);

        return redirect()->route('blog');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // $blog = Blog::create();
        // $blog->user_id   = User::auth()->id();
        // $blog->title     = $request->title;
        // $blog->excerpt   = $request->excerpt;
        // $blog->body      = $request->body;
        // $blog->created_at = now();
        // $blog->updated_at = now();
        // $blog->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->back();
        }

        $blog->delete();

        return redirect()->back();
    }
}
