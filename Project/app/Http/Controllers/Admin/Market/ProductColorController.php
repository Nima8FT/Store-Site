<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductColorRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.market.product.color.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.color.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductColorRequest $request, Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        $color = ProductColor::create($inputs);
        return redirect()->route('market.color.index', $product->id)->with('toast-success', 'رنگ جدید با موفقیت اضافه شد');
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
    public function edit(Product $product, ProductColor $color)
    {
        return view('admin.market.product.color.edit', compact('product', 'color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductColorRequest $request, Product $product, ProductColor $color)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        $color->update($inputs);
        return redirect()->route('market.color.index', $product->id)->with('toast-success', 'رنگ جدید با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductColor $color)
    {
        $color->delete();
        return redirect()->route('market.color.index', $product->id)->with('toast-success', 'رنگ جدید با موفقیت حذف شد');
    }
    public function status(ProductColor $product)
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
}
