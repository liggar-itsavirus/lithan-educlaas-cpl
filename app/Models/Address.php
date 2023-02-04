<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'country',
        'street_address',
        'town_city',
        'district',
        'province',
        'postcode',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
