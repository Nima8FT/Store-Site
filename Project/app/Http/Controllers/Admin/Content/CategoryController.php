<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Services\Image\ImageService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Requests\Admin\Content\PostCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategories = PostCategory::orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.content.category.test", compact("postCategories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.content.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile("image")) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('content.category.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $postCategory = PostCategory::create($inputs);
        return redirect()->route('content.category.index')->with('toast-success', 'دسته بندی با موفقیت اضافه شد');
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
        $postCategory = PostCategory::find($id);
        return view('admin.content.category.edits', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCategoryRequest $request, string $id, ImageService $imageService)
    {
        $postCategory = PostCategory::find($id);
        $inputs = $request->all();
        if ($request->hasFile("image")) {
            if (!empty($postCategory->image)) {
                $imageService->deleteDirectoryAndFiles(($postCategory->image['directory']));
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('content.category.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($postCategory->image)) {
                $image = $postCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $postCategory->update($inputs);
        return redirect()->route("content.category.index")->with('toast-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postCategory = PostCategory::find($id);
        $result = $postCategory->delete();
        return redirect()->route('content.category.index')->with('toast-success', 'دسته بندی با موفقیت حذف شد');
    }

    public function status(PostCategory $postCategory)
    {
        $postCategory->status = $postCategory->status === 0 ? 1 : 0;
        $result = $postCategory->save();
        if ($result) {
            if ($postCategory->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }
}
