<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\MailRequest;
use App\Models\Notify\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mails = Mail::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.notify.email.index", compact("mails"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.notify.email.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MailRequest $request)
    {
        $inputs = $request->all();
        $inputs['published_at'] = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $inputs['published_at']);
        $mail = Mail::create($inputs);
        return redirect()->route('notify.email.index')->with('toast-success', 'ایمیل شما با موفقیت ساخته شد');
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
        $mail = Mail::find($id);
        return view("admin.notify.email.edit", compact("mail"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MailRequest $request, string $id)
    {
        $mail = Mail::find($id);
        $inputs = $request->all();
        $inputs['published_at'] = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int) $inputs['published_at']);
        $mail->update($inputs);
        return redirect()->route('notify.email.index')->with('toast-success', 'ایمیل شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mail = Mail::find($id);
        $result = $mail->delete();
        return redirect()->route('notify.email.index')->with('toast-success', 'ایمیل شما با موفقیت حذف شد');
    }

    public function status(Mail $mail)
    {
        $mail->status = $mail->status === 0 ? 1 : 0;
        $result = $mail->save();
        if ($result) {
            if ($mail->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($mail->status === 1) {
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
