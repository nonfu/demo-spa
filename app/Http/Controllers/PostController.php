<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\Posts as PostCollection;

class PostController extends Controller
{
    // 博客首页
    public function index()
    {
        return new PostCollection(
            Post::with(['author:id,name,email', 'category'])
            ->select(['id', 'title', 'summary', 'image_url', 'category_id', 'user_id', 'created_at'])
            ->orderByDesc('id')
            ->simplePaginate(10)
        );
    }

    // 分类页面
    public function category($name)
    {
        $category = Category::whereName($name)->firstOrFail();
        return new PostCollection(
            Post::with(['author:id,name,email'])
            ->select(['id', 'title', 'summary', 'image_url', 'category_id', 'user_id', 'created_at'])
            ->where('category_id', $category->id)
            ->orderByDesc('id')
            ->simplePaginate(10)
        );
    }

    // 文章详情页
    public function show(Post $post)
    {
        return new PostResource(
            $post->load(['author:id,name,email', 'category'])
        );
    }
}
