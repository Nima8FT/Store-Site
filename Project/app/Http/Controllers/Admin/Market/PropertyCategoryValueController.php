<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\PropertyCategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyCategoryValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryAttribute $categoryAttribute)
    {
        return view("admin.market.property.value.index", compact('categoryAttribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryAttribute $categoryAttribute)
    {
        return view("admin.market.property.value.create", compact('categoryAttribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyCategoryValueRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->all();
        $inputs['category_attribute_id'] = $categoryAttribute->id;
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $propertyCategoryValue = CategoryValue::create($inputs);
        return redirect()->route('market.value.index', $categoryAttribute->id)->with('toast-success', 'ویژگی فرم کالا با موفقیت اضافه شد');
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
    public function edit(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        return view("admin.market.property.value.edit", compact('categoryAttribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyCategoryValueRequest $request, CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $inputs = $request->all();
        $inputs['category_attribute_id'] = $categoryAttribute->id;
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $value->update($inputs);
        return redirect()->route('market.value.index', $categoryAttribute->id)->with('toast-success', 'ویژگی فرم کالا با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $value->delete();
        return redirect()->route('market.value.index', $categoryAttribute->id)->with('toast-success', 'ویژگی فرم کالا با موفقیت حذف شد');
    }
}
