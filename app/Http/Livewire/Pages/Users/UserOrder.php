<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Order;
use Livewire\Component;

class UserOrder extends Component
{
    public $userId, $orderDetails;
    public $pagination = 6;

    public function mount()
    {
        if (auth()->user()) {
            $this->userId = auth()->user()->id;
        }
        $this->orderDetails = Order::where('user_id', $this->userId)->latest()->first();
    }

    public function orderDetail($id)
    {
        return redirect()->route('user.user-order-detail', $id);
    }

    public function render()
    {

        $orderData = Order::where('user_id', $this->userId)->latest()->paginate(99);
        return view('livewire.pages.users.user-order', ['orders' => $orderData])->layoutData(['title' => 'Users Order']);
    }
}
