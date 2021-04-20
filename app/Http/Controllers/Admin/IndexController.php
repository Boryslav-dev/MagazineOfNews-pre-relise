<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller {
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __invoke(Request $request) {
        $posts = Post::whereNull('published_by')->orderByDesc('created_at')->limit(5)->get();
        $comments = Comment::whereNull('published_by')->orderByDesc('created_at')->limit(5)->get();
        return view('admin.index', compact('posts', 'comments'));
    }
}
