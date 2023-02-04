<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Order;
use Asantibanez\LaravelEloquentStateMachines\Exceptions\TransitionNotAllowedException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AdminOrderDetail extends Component
{
    public $order_detail;
    public $order_status;
    public $order_id;

    public function mount($id)
    {
        $this->order_id = $id;
        $this->order_detail = Order::where('id', $id)->get();
    }

    public function updateOrder()
    {
        $order = Order::find($this->order_id);
        $order->order_status()->transitionTo($to = $order->order_status == 'Wait Confirmation' ? 'Wait Courier' : ($order->order_status == 'Wait Courier' ? 'Delivered' : 'Received'));
        sweetalert()->addSuccess('', 'Update Order');
        return redirect()->route('admin.admin-order-detail', $this->order_id);
    }

    public function render()
    {
        return view('livewire.pages.admin.admin-order-detail')->with(['orders' => $this->order_detail]);
    }
}
