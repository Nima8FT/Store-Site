<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Content\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.content.menu.index", compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('parent_id', null)->get();
        return view("admin.content.menu.create", compact("menus"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $inputs = $request->all();
        $menu = Menu::create($inputs);
        return redirect()->route('content.menu.index')->with('toast-success', 'منو شما با موفقیت ساخته شد');
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
        $currentMenu = Menu::find($id);
        $menus = Menu::where('parent_id', null)->get()->except($currentMenu->id);
        return view("admin.content.menu.edit", compact("currentMenu", "menus"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        $inputs = $request->all();
        $menu->update($inputs);
        return redirect()->route('content.menu.index')->with('toast-success', 'منو شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('content.menu.index')->with('toast-success', 'منو شما با موفقیت حذف شد');
    }

    public function status(Menu $menu)
    {
        $menu->status = $menu->status === 0 ? 1 : 0;
        $result = $menu->save();
        if ($result) {
            if ($menu->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($menu->status === 1) {
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
