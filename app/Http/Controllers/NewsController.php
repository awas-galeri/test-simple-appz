<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    public function page()
    {
        return view('dashboard.news.page', [
            'title' => 'News Page',
            'active' => 'news-page',
            'index' => 'news',
            'newses' => News::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function index()
    {
        return view('dashboard.news.index', [
            'title' => 'News',
            'active' => 'news',
            // 'users' => User::where('id', Auth::id())->get(),
        ]);
    }

    public function json(Request $request)
    {
        return DataTables::of(News::where('user_id', Auth::id()))->make(true);
    }

    public function create(Request $request)
    {

        News::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $news = News::create();
        // $news->title     = $request->title;
        // $news->user_id   = Auth::id();
        // $news->excerpt   = $request->excerpt;
        // $news->content      = $request->content;
        // $news->save();

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $news = News::find($id);
        // $blog   = Blog::where('id', $request->id)->first();

        return view('dashboard.news.edit', [
            'title' => 'Edit News',
            'active' => 'news',
            'newses' => $news
        ]);
    }

    public function update(Request $request, $id)
    {
        $news = News::where('id', $id)->first();
        // dd($news);
        if (!$news) {
            return redirect()->back();
        }

        $news->title     = $request->title;
        $news->excerpt   = $request->excerpt;
        $news->content   = $request->content;
        $news->save();

        // dd($news);

        return redirect()->route('news');
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->back();
        }

        $news->delete();

        return redirect()->back();
    }
}
