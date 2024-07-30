<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Requests\Admin\Notify\SMSRequest;
use App\Models\Notify\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smses = SMS::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.notify.sms.index", compact('smses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.notify.sms.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SMSRequest $request)
    {
        $inputs = $request->all();
        $inputs['published_at'] = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $inputs['published_at']);
        $sms = SMS::create($inputs);
        return redirect()->route('notify.sms.index')->with('toast-success', 'پیامک شما با موفقیت ساخته شد');
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
        $sms = SMS::find($id);
        return view("admin.notify.sms.edit", compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SMSRequest $request, string $id)
    {
        $sms = SMS::find($id);
        $inputs = $request->all();
        $inputs['published_at'] = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $inputs['published_at']);
        $sms->update($inputs);
        return redirect()->route('notify.sms.index')->with('toast-success', 'پیامک شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sms = SMS::find($id);
        $sms->delete();
        return redirect()->route('notify.sms.index')->with('toast-success', 'پیامک شما با موفقیت حذف شد');
    }

    public function status(SMS $sms)
    {
        $sms->status = $sms->status === 0 ? 1 : 0;
        $result = $sms->save();
        if ($result) {
            if ($sms->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($sms->status === 1) {
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
