<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductGalleryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Product;
use App\Models\Market\ProductImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view("admin.market.product.gallery.index", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view("admin.market.product.gallery.create", compact("product"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products-gallery');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('market.gallery.index', $product->id)->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $inputs['product_id'] = $product->id;
        $gallery = ProductImage::create($inputs);
        return redirect()->route('market.gallery.index', $product->id)->with('toast-success', 'عکس شما با موفقیت ساخته شد');
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
    public function edit(Product $product, ProductImage $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductImage $gallery)
    {
        $gallery->delete();
        return redirect()->route('market.gallery.index', $product->id)->with('toast-success', 'عکس شما با موفقیت حذف شد');
    }
}
