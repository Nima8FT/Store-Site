<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', 0)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.user.customer.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.user.customer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile("profile_photo_path")) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false) {
                return redirect()->route('user.customer.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $inputs['user_type'] = 0;
        $user = User::create($inputs);
        $_details = [
            'message' => 'یک کاربر جدید در سایت ثبت نام کرد',
        ];
        $adminUser = User::find(1);
        $adminUser->notify(new NewUserRegistered($_details));
        return redirect()->route('user.customer.index')->with('toast-success', ' مشتری جدید با موفقیت ساخته شد');
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
        $user = User::find($id);
        return view("admin.user.customer.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id, ImageService $imageService)
    {
        $user = User::find($id);
        $inputs = $request->all();
        if ($request->hasFile("profile_photo_path")) {
            if (!empty($user->profile_photo_path)) {
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false) {
                return redirect()->route('user.customer.index')->with('swal-error', 'اپلود عکس با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $result = $user->update($inputs);
        return redirect()->route('user.customer.index')->with('toast-success', ' ادمین جدید با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.customer.index')->with('toast-success', ' ادمین جدید با موفقیت حذف شد');
    }

    public function status(User $user)
    {
        $user->status = $user->status === 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {
            if ($user->status === 0) {
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

    public function activation(User $user)
    {
        $user->activation = $user->activation === 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {
            if ($user->activation === 0) {
                return response()->json([
                    'activation' => true,
                    'checked' => false
                ]);
            } else {
                return response()->json([
                    'activation' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json([
                'activation' => false,
            ]);
        }
    }
}
