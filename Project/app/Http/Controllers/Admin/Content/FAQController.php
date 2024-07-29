<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\FaqRequest;
use App\Models\Content\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.content.faq.index", compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.content.faq.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $inputs = $request->all();
        $faq = Faq::create($inputs);
        return redirect()->route("content.faq.index")->with("toast-success", "سوال متداول با موفقیت ساخته شد");
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
        $faq = Faq::find($id);
        return view("admin.content.faq.edit", compact("faq"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::find($id);
        $inputs = $request->all();
        $faq->update($inputs);
        return redirect()->route("content.faq.index")->with("toast-success", "سوال متداول با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->route("content.faq.index")->with("toast-success", "سوال متداول با موفقیت حذف شد");
    }

    public function status(Faq $faq)
    {
        $faq->status = $faq->status === 0 ? 1 : 0;
        $result = $faq->save();
        if ($result) {
            if ($faq->status) {
                return response()->json([
                    "status" => true,
                    "checked" => true,
                ]);
            } else {
                return response()->json([
                    "status" => true,
                    "checked" => false,
                ]);
            }
        } else {
            return response()->json(["status" => false]);
        }
    }
}
