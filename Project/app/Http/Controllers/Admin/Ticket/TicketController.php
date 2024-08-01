<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Requests\Admin\Ticket\TicketRequest;
use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function newTickets()
    {
        $tickets = Ticket::where('seen', 0)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.ticket.index", compact('tickets'));
    }

    public function openTickets()
    {
        $tickets = Ticket::where('status', 1)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.ticket.index", compact('tickets'));
    }

    public function closeTickets()
    {
        $tickets = Ticket::where('status', 0)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.ticket.index", compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::orderBy("created_at", "desc")->paginate(10);
        return view("admin.ticket.index", compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show(Ticket $ticket)
    {
        $ticket->seen = 1;
        $ticket->save();
        return view("admin.ticket.show", compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function change(Ticket $ticket)
    {
        $ticket->status = $ticket->status == 0 ? 1 : 0;
        $ticket->save();
        return redirect()->route("ticket.index");
    }

    public function answer(TicketRequest $request, Ticket $ticket)
    {
        $inputs = $request->all();
        $inputs['subject'] = $ticket->subject;
        $inputs['status'] = 1;
        $inputs['seen'] = 1;
        $inputs['refrence_id'] = $ticket->refrence_id;
        $inputs['user_id'] = $ticket->refrence_id;
        $inputs['user_id'] = 1;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;
        $ticket->create($inputs);
        return redirect()->route('ticket.index')->with('toast-success', 'پاسخ شما برای تیکت با موفقیت ثبت شد');
    }
}
