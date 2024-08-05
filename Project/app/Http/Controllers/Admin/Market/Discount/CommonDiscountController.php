<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\CommonDiscount;
use Illuminate\Http\Request;

class CommonDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $common_discounts = CommonDiscount::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.discount.commondiscount.index", compact('common_discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.market.discount.commondiscount.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $common_discount = CommonDiscount::create($inputs);
        return redirect()->route('market.common-discount.index')->with('toast-success', 'تخفیف عمومی با موفقیت ساخته شد');
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
        $common_discount = CommonDiscount::find($id);
        return view('admin.market.discount.commondiscount.edit', compact('common_discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommonDiscountRequest $request, string $id)
    {
        $common_discount = CommonDiscount::find($id);
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $common_discount->update($inputs);
        return redirect()->route('market.common-discount.index')->with('toast-success', 'تخفیف عمومی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $common_discount = CommonDiscount::find($id);
        $common_discount->delete();
        return redirect()->route('market.common-discount.index')->with('toast-success', 'تخفیف عمومی با موفقیت حذف شد');
    }

    public function status(CommonDiscount $common_discount)
    {
        $common_discount->status = $common_discount->status === 0 ? 1 : 0;
        $result = $common_discount->save();
        if ($result) {
            if ($common_discount->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($common_discount->status === 1) {
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
