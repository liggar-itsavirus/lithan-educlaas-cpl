<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_category',
        'product_description',
        'product_price',
        'product_image',
        'product_quantity',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
