<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view("admin.setting.index", compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $setting = Setting::find($id);
        return view("admin.setting.edit", compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id, ImageService $imageService)
    {
        $setting = Setting::find($id);
        $inputs = $request->all();
        if ($request->has('logo')) {
            if (!empty($setting->logo)) {
                $imageService->deleteImage($setting->logo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('logo');
            $result = $imageService->save($request->file('logo'));
            if ($result == false) {
                return redirect()->route('setting.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        if ($request->has('icon')) {
            if (!empty($setting->icon)) {
                $imageService->deleteImage($setting->icon);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('icon');
            $result = $imageService->save($request->file('icon'));
            if ($result == false) {
                return redirect()->route('setting.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['icon'] = $result;
        }
        $setting->update($inputs);
        return redirect()->route('setting.index')->with('toast-success', 'تنظیمات سایت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
