<?php

namespace App\Http\Controllers\Admin\Market\Discount;

use App\Http\Requests\Admin\Market\CopanRequest;
use App\Models\User;
use App\Models\Market\Copan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CopanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $copans = Copan::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.discount.copan.index", compact("copans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.discount.copan.create", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CopanRequest $request)
    {
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $copan = Copan::create($inputs);
        return redirect()->route('market.copan.index')->with('toast-success', 'کد تخفیف شما با موفقیت اعمال شد');
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
        $copan = Copan::find($id);
        $users = User::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.discount.copan.edit", compact("users", 'copan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CopanRequest $request, string $id)
    {
        $copan = Copan::find($id);
        $inputs = $request->all();
        $realTimeStamp = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        $realTimeStamp = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int) $realTimeStamp);
        if ($request->type == 0) {
            $inputs['user_id'] = null;
        }
        $copan->update($inputs);
        return redirect()->route('market.copan.index')->with('toast-success', 'کد تخفیف شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $copan = Copan::find($id);
        $copan->delete();
        return redirect()->route('market.copan.index')->with('toast-success', 'کد تخفیف شما با موفقیت حذف شد');
    }

    public function status(Copan $copan)
    {
        $copan->status = $copan->status === 0 ? 1 : 0;
        $result = $copan->save();
        if ($result) {
            if ($copan->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($copan->status === 1) {
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
