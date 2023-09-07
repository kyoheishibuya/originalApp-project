<?php

namespace App\Http\Controllers;

use Illuminate\Http\aRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;


class OldPostController extends Controller
{
    public function create() {
        return view('post.create');
    }
    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }
    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);
        $validated['user_id'] = auth()->id();

        $post->update($validated);

        $request->session()->flash('message','更新しました');
        return redirect()->route('post.show', compact('post'));
    }

    public function store(Request $request) {
        Gate::authorize('test');
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);
        $request->session()->flash('message','保存しました');
        return redirect()->route('post.index');

    }

    public function index() {
        // postsテーブルのすべてのデータを取得
        $posts=Post::with('user')->get();

        // postsテーブルのすべてのデータを取得
        //$posts=Post::all();

        // postsテーブルのログインユーザーのデータを取得
        // $posts=Post::where('user_id', auth()->id())->get();

        // postsテーブルのログインユーザー以外のデータを取得
        // $posts=Post::where('user_id', '!=', auth()->id())->get();

        // postsテーブルの2022/12/2以降のデータを取得
        // $posts=Post::whereDate('created_at', '>=', '2022-12-02')->get();

        // postsテーブルのuser_idが1で2022/12/2以降のデータを取得
        // $posts=Post::where('user_id', 1)->whereDate('created_at', '>=', '2022-12-02')->get();

        // postsテーブルのすべてのデータを新しい順に取得
        // $posts=Post::orderBy('created_at', 'desc')->get();

        return view('post.index', compact('posts'));
    }
    public function show(Post $post){
        return view('post.show', compact('post'));
    }
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect('post.index');
    }
}

