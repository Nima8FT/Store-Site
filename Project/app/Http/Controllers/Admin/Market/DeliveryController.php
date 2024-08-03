<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\DeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivery_methods = Delivery::orderBy("created_at", "desc")->simplePaginate(15);
        return view("admin.market.delivery.index", compact('delivery_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.market.delivery.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        $inputs = $request->all();
        $delivery = Delivery::create($inputs);
        return redirect()->route("market.delivery.index")->with("toast-success", "روش ارسال با موفقیت ساخته شد");
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
        $delivery = Delivery::find($id);
        return view("admin.market.delivery.edit", compact("delivery"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, string $id)
    {
        $delivery = Delivery::find($id);
        $inputs = $request->all();
        $delivery->update($inputs);
        return redirect()->route("market.delivery.index")->with("toast-success", "روش ارسال با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        return redirect()->route("market.delivery.index")->with("toast-success", "روش ارسال با موفقیت حذف شد");
    }

    public function status(Delivery $delivery)
    {
        $delivery->status = $delivery->status === 0 ? 1 : 0;
        $result = $delivery->save();
        if ($result) {
            if ($delivery->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }
}
