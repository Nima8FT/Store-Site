<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.ticket.admin.index", compact('admins'));
    }

    public function set(User $user)
    {
        TicketAdmin::where('user_id', $user->id)->first() ? TicketAdmin::where('user_id', $user->id)->delete() : TicketAdmin::create(['user_id' => $user->id]);
        return redirect()->route('ticket.admin.index')->with('toast-success', 'تغیر شما با موفقیت انجام شد');
    }
}
