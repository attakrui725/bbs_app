<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
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
          'category_id' => $request->category_id,
      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('/bbs')->with('poststatus', '新規投稿しました');
    }

    public function edit($post_id)
    {
        $post = Post::findFail($post_id);
        return view('bbs.edit', ['post' => $post]);
    }

    public function update(PostRequest $request)
    {
      $davedata = [
        'name' => $request->name,
        'subject' => $request->subject,
        'message' => $request->message,
        'category_id' => $request->category_id,
      ];

      $post = new Post;
      $post->fill($savedata)->save();

      return redirect('/bbs')->with('poststatus', '投稿を編集しました');
    }
}
