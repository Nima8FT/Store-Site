<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.content.post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view("admin.content.post.create", compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $realTimeStamp = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('content.post.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $inputs['author_id'] = 1;
        $post = Post::create($inputs);
        return redirect()->route('content.post.index')->with('toast-success', 'پست با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $postCategories = PostCategory::all();
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id, ImageService $imageService)
    {
        $post = Post::find($id);
        $inputs = $request->all();
        if ($request->has('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('content.post.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $realTimeStamp = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $inputs['author_id'] = 1;
        $post->update($inputs);
        return redirect()->route('content.post.index')->with('toast-success', 'پست با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $result = $post->delete();
        return redirect()->route('content.post.index')->with('toast-success', 'پست با موفقیت حذف شد');
    }

    public function status(Post $post)
    {
        $post->status = $post->status === 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($post->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function commentable(Post $post)
    {
        $post->commentable = $post->commentable === 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable === 0) {
                return response()->json([
                    'commentable' => true,
                    'checked' => false
                ]);
            } else if ($post->commentable === 1) {
                return response()->json([
                    'commentable' => true,
                    'checked' => true
                ]);
            }
        } else {
            response()->json(['commentable' => false]);
        }
    }
}
