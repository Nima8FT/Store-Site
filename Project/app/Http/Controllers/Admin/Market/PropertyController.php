<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\PropertyRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryAttributes = CategoryAttribute::orderBy("created_at", "desc")->simplePaginate(15);
        return view("admin.market.property.index", compact('categoryAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view("admin.market.property.create", compact("productCategories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $inputs = $request->all();
        $categoryAttribute = CategoryAttribute::create($inputs);
        return redirect()->route("market.property.index")->with("toast-success", "فرم کالا با موفقیت ایجاد شد");
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
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view("admin.market.property.edit", compact("productCategories", "categoryAttribute"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, string $id)
    {
        $inputs = $request->all();
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $categoryAttribute->update($inputs);
        return redirect()->route("market.property.index")->with("toast-success", "فرم کالا با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $categoryAttribute->delete();
        return redirect()->route("market.property.index")->with("toast-success", "فرم کالا با موفقیت حذف شد");
    }
}
