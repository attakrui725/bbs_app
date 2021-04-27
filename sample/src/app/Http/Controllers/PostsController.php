<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index()
    {
      $posts = Post::orderBy('created_at', 'desc')->paginate(10);
      return view('bbs.index', ['posts' => $posts]);
    }

    public function show(Request $request, $id)
    {
      $post = Post::findOrFail($id);

      return view('bbs.show', [
        'post' => $post,
        ]);
    }

    public function create()
    {
      return view('bbs.create');
    }

    public function store(PostRequest $request)
    {
      $savedata = [
          'name' => $request->name,
          'subject' => $request->subject,
          'message' => $request->message,

      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('/bbs')->with('poststatus', '新規投稿しました');
    }

    public function edit($post_id)
    {

        $post = Post::findOrFail($post_id);
        PostService::check_permission();

        return view('bbs.edit', ['post' => $post]);

    }

    public function update(PostRequest $request, Post $post)
    {
      PostService::check_permission();

      $savedata = [
        'name' => $request->name,
        'subject' => $request->subject,
        'message' => $request->message,
      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('/bbs')->with('poststatus', '投稿を編集しました');
    }


    public function destroy($id)
    {
      $post = Post::findOrFail($id);
        PostService::check_permission();
      $post->comments()->delete();
      $post->delete();

      return redirect('/bbs')->with('poststatus', '投稿を削除しました');
    }
}
