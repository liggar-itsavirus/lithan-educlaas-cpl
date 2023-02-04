<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;

class UserOrderDetail extends Component
{
    public $order_detail;
    public $order_id;
    public function mount($id)
    {
        $this->order_id = $id;
        $this->order_detail = Order::where('id', $id)->get();
    }

    public function updateOrder()
    {
        $order = Order::find($this->order_id);
        $order->order_status()->transitionTo('Received');
        sweetalert()->addSuccess('Order Received Successfully', 'Successfully');
        return redirect()->route('user.user-order-detail', $this->order_id);
    }

    public function render()
    {
        return view('livewire.pages.users.user-order-detail')->with(['orders' => $this->order_detail]);
    }
}
