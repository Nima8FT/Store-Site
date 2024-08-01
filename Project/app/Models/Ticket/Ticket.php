<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'description', 'status', 'seen', 'refrence_id', 'user_id', 'category_id', 'priority_id', 'ticket_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adminTicket()
    {
        return $this->belongsTo(TicketAdmin::class, 'refrence_id');
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function priority()
    {
        return $this->belongsTo(TicketPriority::class);
    }

    public function parent()
    {
        return $this->belongsTo($this, 'ticket_id')->with('parent');
    }
}
