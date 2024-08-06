<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notify\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function read()
    {
        $notifications = Notification::where('read_at', null)->get();
        foreach ($notifications as $notification) {
            $notification->update(['read_at' => now()]);
        }
    }
}
