<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Requests\Admin\Market\BrandRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.brand.index", compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.market.brand.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-brand');
            $result = $imageService->save($request->file('logo'));
            if ($result == false) {
                return redirect()->route('market.brand.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        $brand = Brand::create($inputs);
        return redirect()->route("market.brand.index")->with("toast-success", "برند با موفقیت ساخته شد");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view("admin.market.brand.edit", compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view("admin.market.brand.edit", compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id, ImageService $imageService)
    {
        $inputs = $request->all();
        $brand = Brand::find($id);
        if ($request->has('logo')) {
            if (!empty($brand->image)) {
                $imageService->deleteDirectoryAndFiles($brand->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->save($request->file('logo'));
            if ($result == false) {
                return redirect()->route('market.brand.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        $brand->update($inputs);
        return redirect()->route("market.brand.index")->with("toast-success", "برند با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route("market.brand.index")->with("toast-success", "برند با موفقیت حذف شد");
    }

    public function status(Brand $brand)
    {
        $brand->status = $brand->status === 0 ? 1 : 0;
        $result = $brand->save();
        if ($result) {
            if ($brand->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($brand->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
