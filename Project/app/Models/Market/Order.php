<?php

namespace App\Models\Market;

use App\Models\User;
use App\Models\Market\Address;
use App\Models\Market\Payment;
use App\Models\Market\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function copan()
    {
        return $this->belongsTo(Copan::class);
    }

    public function commonDiscount()
    {
        return $this->belongsTo(CommonDiscount::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPaymentStatusValueAttribute()
    {
        $result = '';
        switch ($this->payment_status) {
            case 0:
                $result = 'پرداخت نشده';
                break;
            case 1:
                $result = 'پرداخت شده';
                break;
            case 2:
                $result = 'باطل شده';
                break;
            case 3:
                $result = 'برگشت داده شده';
                break;
        }
        return $result;
    }

    public function getPaymentTypeValueAttribute()
    {
        $result = '';
        switch ($this->payment_type) {
            case 0:
                $result = 'انلاین';
                break;
            case 1:
                $result = 'افلاین';
                break;
            case 2:
                $result = 'در محل';
                break;
        }
        return $result;
    }

    public function getDeliveryStatusValueAttribute()
    {
        $result = '';
        switch ($this->delivery_status) {
            case 0:
                $result = 'ارسال شده';
                break;
            case 1:
                $result = 'در حال ارسال';
                break;
            case 2:
                $result = 'ارسال شده';
                break;
            case 3:
                $result = 'تحویل داده شده';
                break;
        }
        return $result;
    }

    public function getOrderStatusValueAttribute()
    {
        $result = '';
        switch ($this->order_status) {
            case 0:
                $result = 'در انتظار تایید';
                break;
            case 1:
                $result = 'تایید نشده';
                break;
            case 2:
                $result = 'تایید شده';
                break;
            case 3:
                $result = 'باطل شده';
                break;
            case 4:
                $result = 'مرجوع شده';
                break;
            case 5:
                $result = 'بررسی نشده';
                break;
        }
        return $result;
    }
}
