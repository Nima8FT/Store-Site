<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketes = TicketCategory::orderBy("created_at", "desc")->simplePaginate(10);
        return view('admin.ticket.category.index', compact('ticketes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketCategoryRequest $request)
    {
        $inputs = $request->all();
        $ticketCategory = TicketCategory::create($inputs);
        return redirect()->route('ticket.category.index')->with('toast-success', 'تیکت دسته بندی با موفقیت اضافه شد');
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
        $ticketCategory = TicketCategory::find($id);
        return view('admin.ticket.category.edit', compact('ticketCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketCategoryRequest $request, string $id)
    {
        $ticketCategory = TicketCategory::find($id);
        $inputs = $request->all();
        $ticketCategory->update($inputs);
        return redirect()->route('ticket.category.index')->with('toast-success', 'تیکت دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticketCategory = TicketCategory::find($id);
        $ticketCategory->delete();
        return redirect()->route('ticket.category.index')->with('toast-success', 'تیکت دسته بندی با موفقیت حذف شد');
    }

    public function status(TicketCategory $ticket)
    {
        $ticket->status = $ticket->status === 0 ? 1 : 0;
        $result = $ticket->save();
        if ($result) {
            if ($ticket->status === 0) {
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
