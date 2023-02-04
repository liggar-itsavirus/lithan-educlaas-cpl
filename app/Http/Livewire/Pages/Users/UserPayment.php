<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Asantibanez\LaravelEloquentStateMachines\Exceptions\TransitionNotAllowedException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Stripe;

class UserPayment extends Component
{
    public $cartitems, $totalPrice, $cardholder, $address, $total_quantity;
    public $defaultshipping = 10;

    public function mount()
    {
        $this->address = Address::where('user_id', auth()->id())->first();
        $this->cartitems = Cart::where(['user_id' => auth()->user()->id])->get();
        foreach ($this->cartitems as $cart_item) {
            $this->totalPrice += $cart_item->products->product_price * $cart_item->amount;
            $this->total_quantity += $cart_item->amount;
        }
    }

    public function codPayment()
    {
        if ($this->cartitems) {
            try {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'address_id' => $this->address->id,
                    'payment_status' => 'Unpaid',
                    'total_price' => $this->totalPrice + $this->defaultshipping,
                    'payment_type' => 'COD',
                    'total_quantity' => $this->total_quantity,
                ]);
                foreach ($this->cartitems as $cart_item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $cart_item->products->id,
                        'product_quantity' => $cart_item->amount,
                        'subtotal_price' => $cart_item->products->product_price * $cart_item->amount
                    ]);
                    $cart_item->products->product_quantity -= $cart_item->amount;
                    $cart_item->products->save();
                    $cart_item->delete();
                    $this->emit('updateCartCount');
                }
                $order->order_status()->transitionTo();
            } catch (TransitionNotAllowedException $exception) {
                throw ValidationException::withMessages([]);
            } finally {
                sweetalert()->addSuccess('', 'Order Successfully');
                return redirect()->route('user.user-order');
            }
        } else {
            sweetalert()->addWarning('', 'You not have an order yet');
        }
    }

    public function cardPayment($token)
    {
        if ($this->cartitems) {
            try {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'address_id' => $this->address->id,
                    'payment_status' => 'Paid',
                    'total_price' => $this->totalPrice + $this->defaultshipping,
                    'payment_type' => 'Card Payment',
                    'total_quantity' => $this->total_quantity,
                ]);

                foreach ($this->cartitems as $cart_item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $cart_item->products->id,
                        'product_quantity' => $cart_item->amount,
                        'subtotal_price' => $cart_item->products->product_price * $cart_item->amount
                    ]);
                    $cart_item->products->product_quantity -= $cart_item->amount;
                    $cart_item->products->save();
                    $cart_item->delete();
                    $this->emit('updateCartCount');
                }

                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $customer = Stripe\Customer::create(array(
                    "email" => auth()->user()->email,
                    "name" => $this->cardholder,
                    "source" => $token
                ));

                \Stripe\Charge::create([
                    "amount" => ($this->totalPrice + $this->defaultshipping) * 100,
                    "currency" => (env('STRIPE_CURRENCY')),
                    "customer" => $customer->id,
                    "description" => 'Order Successfully'
                ]);
                $order->order_status()->transitionTo();
            } catch (TransitionNotAllowedException $exception) {
                throw ValidationException::withMessages([]);
            } finally {
                sweetalert()->addSuccess('', 'Order Successfully');
                return redirect()->route('user.user-order');
            }
        } else {
            sweetalert()->addWarning('', 'You not have an order yet');
        }
    }

    public function render()
    {
        $this->cartitems = Cart::with('products')->where(['user_id' => auth()->user()->id])->get();
        return view('livewire.pages.users.user-payment');
    }
}
