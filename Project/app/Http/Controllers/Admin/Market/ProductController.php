<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductMeta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::orderBy("created_at", "desc")->simplePaginate(10);
        $brands = Brand::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.product.create", compact('productCategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('market.product.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $realTimeStamp = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        DB::transaction(function () use ($inputs, $request) {
            $product = Product::create($inputs);
            $metas = array_combine($request->meta_key, $request->meta_value);
            foreach ($metas as $key => $value) {
                $meta = ProductMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'product_id' => $product->id,
                ]);
            }
        });
        return redirect()->route('market.product.index')->with('toast-success', '  کالای شما با موفقیت اضافه شد');
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
        $product = Product::find($id);
        $productCategories = ProductCategory::orderBy("created_at", "desc")->simplePaginate(10);
        $brands = Brand::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.product.edit", compact("product", 'productCategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id, ImageService $imageService)
    {
        $product = Product::find($id);
        $inputs = $request->all();
        if ($request->has('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('market.product.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $realTimeStamp = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $product->update($inputs);
        $meta_keys = $request->meta_key;
        $meta_values = $request->meta_value;
        $meta_ids = array_keys($request->meta_key);
        $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
            return array_combine(
                ['meta_id', 'meta_key', 'meta_value'],
                [$meta_id, $meta_key, $meta_value],
            );
        }, $meta_ids, $meta_keys, $meta_values);
        foreach ($metas as $meta) {
            ProductMeta::where('id', $meta['meta_id'])->update([
                'meta_key' => $meta['meta_key'],
                'meta_value' => $meta['meta_value'],
            ]);
        }
        return redirect()->route('market.product.index')->with('toast-success', 'کالا با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('market.product.index')->with('toast-success', 'کالا با موفقیت حذف شد');
    }

    public function status(Product $product)
    {
        $product->status = $product->status === 0 ? 1 : 0;
        $result = $product->save();
        if ($result) {
            if ($product->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($product->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function marketable(Product $product)
    {
        $product->marketable = $product->marketable === 0 ? 1 : 0;
        $result = $product->save();
        if ($result) {
            if ($product->marketable === 0) {
                return response()->json([
                    'marketable' => true,
                    'checked' => false
                ]);
            } else if ($product->marketable === 1) {
                return response()->json([
                    'marketable' => true,
                    'checked' => true
                ]);
            }
        } else {
            response()->json(['show_in_menu' => false]);
        }
    }
}
