<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Cart;
use Flasher\SweetAlert\Laravel\Facade\SweetAlert;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartitems;
    public $totalPrice = 0;

    public $defaultshipping = 10;

    public function mount()
    {
        $this->cartitems = Cart::with('products')->where(['user_id' => auth()->user()->id])->get();
        $cart = Cart::where(['user_id' => auth()->user()->id])->get();
        foreach ($cart as $cart_item) {
            $this->totalPrice += $cart_item->products->product_price * $cart_item->amount;
        }
    }

    public function plusProduct($id)
    {
        $cart = Cart::find($id);
        if ($cart->amount < $cart->products->product_quantity) {
            $cart->amount++;
            $cart->save();
            $this->totalPrice = $this->totalPrice + $cart->products->product_price;
        }
    }

    public function minusProduct($id)
    {
        $cart = Cart::find($id);
        if ($cart->amount > 1) {
            $cart->amount--;
            $cart->save();
            $this->totalPrice = $this->totalPrice - $cart->products->product_price;
        }
    }

    public function removeProduct($id)
    {
        $cart = Cart::find($id)->first();

        if ($cart) {
            $cart->delete();
        }
        $this->emit('updateCartCount');
        sweetalert()->addSuccess('Product has been removed from cart');
    }

    public function shippingAddress()
    {
        if (!$this->cartitems->isEmpty()) {
            return redirect()->route('user.shipping-address');
        } else {
            sweetAlert()->addWarning('Test', 'title');
            return back();
        }
    }

    public function render()
    {
        $this->cartitems = Cart::with('products')->where(['user_id' => auth()->user()->id])->get();
        return view('livewire.pages.users.shopping-cart');
    }
}
