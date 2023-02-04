<?php

namespace App\Models;

use Asantibanez\LaravelEloquentStateMachines\Traits\HasStateMachines;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasStateMachines;
    protected $fillable = [
        'user_id',
        'address_id',
        'payment_status',
        'total_price',
        'payment_type',
        'total_quantity',
    ];

    public $stateMachines = [
        'order_status' => StatusStateMachine::class,
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
