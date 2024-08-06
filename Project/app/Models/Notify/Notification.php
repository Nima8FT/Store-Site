<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['data' => 'array'];

    protected $primaryKey = 'id'; // By default, Laravel uses 'id', ensure this matches your UUID column

    // Ensure that incrementing is false since UUIDs are not incrementing integers
    public $incrementing = false;

    // Ensure the key type is string
    protected $keyType = 'string';

    // Override the getRouteKeyName method to use the UUID as the route key
    public function getRouteKeyName()
    {
        return 'id'; // or the column name of your UUID, if it's not 'id'
    }
}
