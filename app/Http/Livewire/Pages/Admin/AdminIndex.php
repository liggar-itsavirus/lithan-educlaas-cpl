<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminIndex extends Component
{
    public function render()
    {
        $productData = Product::latest()->paginate(3);
        $orderData = Order::latest()->paginate(3);
        $userData = User::where('role', 'user')->latest()->paginate(3);
        return view('livewire.pages.admin.admin-index')->with(['products' => $productData, 'orders' => $orderData, 'users' => $userData]);
        // dd($this->productData);
    }
}
