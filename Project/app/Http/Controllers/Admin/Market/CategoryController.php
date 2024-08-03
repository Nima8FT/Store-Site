<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy("created_at", "desc")->simplePaginate(15);
        return view("admin.market.category.index", compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::where('parent_id', null)->orderBy('created_at', 'desc')->simplePaginate(15);
        return view("admin.market.category.create", compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('content.post.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $productCategories = ProductCategory::create($inputs);
        return redirect()->route('market.category.index')->with('toast-success', 'دسته بندی محصولات با موفقیت اضافه شد');
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
        $productCategory = ProductCategory::find($id);
        $productCategoriesParrent = ProductCategory::where('parent_id', null)->orderBy('created_at', 'desc')->simplePaginate(15);
        return view("admin.market.category.edit", compact('productCategoriesParrent', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, string $id, ImageService $imageService)
    {
        $inputs = $request->all();
        $productCategory = ProductCategory::find($id);
        if ($request->has('image')) {
            if (!empty($productCategory->image)) {
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('content.post.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $productCategory->update($inputs);
        return redirect()->route('market.category.index')->with('toast-success', 'دسته بندی محصولات با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
        return redirect()->route('market.category.index')->with('toast-success', 'دسته بندی محصولات با موفقیت حذف شد');
    }

    public function status(ProductCategory $category)
    {
        $category->status = $category->status === 0 ? 1 : 0;
        $result = $category->save();
        if ($result) {
            if ($category->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($category->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function showMenu(ProductCategory $category)
    {
        $category->show_in_menu = $category->show_in_menu === 0 ? 1 : 0;
        $result = $category->save();
        if ($result) {
            if ($category->show_in_menu === 0) {
                return response()->json([
                    'show_in_menu' => true,
                    'checked' => false
                ]);
            } else if ($category->show_in_menu === 1) {
                return response()->json([
                    'show_in_menu' => true,
                    'checked' => true
                ]);
            }
        } else {
            response()->json(['show_in_menu' => false]);
        }
    }
}
