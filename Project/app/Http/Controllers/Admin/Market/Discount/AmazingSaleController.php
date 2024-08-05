<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class AmazingSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amazing_sales = AmazingSale::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.discount.amazingsale.index", compact('amazing_sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.market.discount.amazingsale.create", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmazingSaleRequest $request)
    {
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $amazingSale = AmazingSale::create($inputs);
        return redirect()->route('market.amazing-sale.index')->with('toast-success', 'تخفیف شگفت انگیز با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amazing_sale = AmazingSale::find($id);
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.market.discount.amazingsale.edit", compact("products", "amazing_sale"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmazingSaleRequest $request, string $id)
    {
        $amazingSale = AmazingSale::find($id);
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $amazingSale->update($inputs);
        return redirect()->route('market.amazing-sale.index')->with('toast-success', 'تخفیف شگفت انگیز با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amazingSale = AmazingSale::find($id);
        $amazingSale->delete();
        return redirect()->route('market.amazing-sale.index')->with('toast-success', 'تخفیف شگفت انگیز با موفقیت حذف شد');
    }

    public function status(AmazingSale $amazing_sale)
    {
        $amazing_sale->status = $amazing_sale->status === 0 ? 1 : 0;
        $result = $amazing_sale->save();
        if ($result) {
            if ($amazing_sale->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($amazing_sale->status === 1) {
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
