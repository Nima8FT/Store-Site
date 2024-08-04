<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Requests\Admin\Market\StoreUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToStore(Product $product)
    {
        return view("admin.market.store.add-to-store", compact("product"));
    }
    public function index()
    {
        $products = Product::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.store.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
    }

    public function addStore(StoreRequest $request, Product $product)
    {
        $product->marketable_number += $request->marketable_number;
        $product->save();
        Log::info("receiver => {$request->receiver}, deliver => {$request->deliver}, description => {$request->description} , add => {$request->marketable_number}");
        return redirect()->route("market.store.index")->with('toast-success', 'موجودی با موفقیت اضافه شد');
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
        return view("admin.market.store.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, string $id)
    {
        $product = Product::find($id);
        $inputs = $request->all();
        $product->update($inputs);
        return redirect()->route("market.store.index")->with('toast-success', 'انبار با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
