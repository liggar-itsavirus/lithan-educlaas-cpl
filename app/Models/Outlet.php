<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'outlet_name',
        'street_address',
        'district',
        'town_city',
        'province',
        'postcode',
        'phone_number',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
