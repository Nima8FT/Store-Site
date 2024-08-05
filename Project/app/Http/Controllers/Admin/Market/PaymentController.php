<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Payment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy("created_at", "desc")->simplePaginate(10);
        return view("admin.market.payment.index", compact('payments'));
    }

    public function online()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OnlinePayment')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.market.payment.index", compact('payments'));
    }

    public function offline()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OfflinePayment')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.market.payment.index", compact('payments'));
    }

    public function cash()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\CashPayment')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.market.payment.index", compact('payments'));
    }

    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        return redirect()->route('market.admin.market.payment.all')->with('toast-success', 'با موفقیت کنسل شد مبلغ پرداختی');
    }

    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        return redirect()->route('market.admin.market.payment.all')->with('toast-success', 'با موفقیت برگردانده شد مبلغ پرداختی');
    }
}
