<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Order;
use Livewire\Component;

class ManageOrder extends Component
{
    public $userId, $orderDetails;
    public $pagination = 6;

    public function mount()
    {
    }

    public function orderDetail($id)
    {
        return redirect()->route('admin.admin-order-detail', $id);
    }

    public function render()
    {
        $order_data = Order::get()->all();
        return view('livewire.pages.admin.manage-order', ['orders' => $order_data]);
    }
}
