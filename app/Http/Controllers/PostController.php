<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\Posts as PostCollection;
use App\Http\Resources\Categories as CategoryCollection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    // 获取分类列表
    public function categories()
    {
        return new CategoryCollection(
            Category::all()
        );
    }

    // 文章发布
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => [
                'required',
                Rule::in(Category::query()->pluck('id')->toArray())
            ],
            'image' => 'required|image|max:1024',
            'content' => 'required|string',
            'summary' => 'required|string|max:200',
        ]);

        $post = new Post($data);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $local_path = $image->storePublicly('images', ['disk' => 'public']);
            $post->image_url = '/storage/' . $local_path;
        }

        try {
            $post->user_id = 1;  // 默认为测试用户发布文章
            $post->save();
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => '文章发布失败']);
        }

        return response()->json(['success' => true, 'data' => $post->id, 'message' => '文章发布成功']);
    }
}
