<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketPriorityRequest;
use App\Models\Ticket\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketes = TicketPriority::orderBy("created_at", "desc")->simplePaginate(10);
        return view('admin.ticket.priority.index', compact('ticketes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketPriorityRequest $request)
    {
        $inputs = $request->all();
        $ticketCategory = TicketPriority::create($inputs);
        return redirect()->route('ticket.prioriy.index')->with('toast-success', 'اولویت تیکت با موفقیت اضافه شد');
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
        $ticketPriority = TicketPriority::find($id);
        return view('admin.ticket.priority.edit', compact('ticketPriority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticketCategory = TicketPriority::find($id);
        $inputs = $request->all();
        $ticketCategory->update($inputs);
        return redirect()->route('ticket.prioriy.index')->with('toast-success', ' اولویت تیکت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticketCategory = TicketPriority::find($id);
        $ticketCategory->delete();
        return redirect()->route('ticket.prioriy.index')->with('toast-success', 'اولویت تیکت با موفقیت حذف شد');
    }

    public function status(TicketPriority $ticket)
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
