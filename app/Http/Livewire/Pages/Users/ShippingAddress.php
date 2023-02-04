<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Address;
use App\Models\Cart;
use Livewire\Component;

class ShippingAddress extends Component
{
    public $cartitems;
    public $totalPrice;
    public $defaultshipping = 10;

    public $address_id, $first_name, $last_name, $phone_number, $country, $street_address, $town_city, $district, $province, $postcode;

    protected $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'phone_number' => 'required|max:12',
        'street_address' => 'required',
        'town_city' => 'required',
        'district' => 'required',
        'province' => 'required',
        'postcode' => 'required',
    ];

    public function mount()
    {
        $cart = Cart::where(['user_id' => auth()->user()->id])->get();
        foreach ($cart as $cart_item) {
            $this->totalPrice += $cart_item->products->product_price * $cart_item->amount;
        }

        $addressExist = Address::where('user_id', auth()->id())->first();
        if ($addressExist) {
            $this->address_id = $addressExist->id;
            $address = Address::find($this->address_id);
            $this->first_name = $address->first_name;
            $this->last_name = $address->last_name;
            $this->phone_number = $address->phone_number;
            $this->street_address = $address->street_address;
            $this->town_city = $address->town_city;
            $this->district = $address->district;
            $this->province = $address->province;
            $this->postcode = $address->postcode;
        }
    }

    public function submit()
    {
        $this->validate();
        if (!$this->address_id) {
            Address::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone_number' => $this->phone_number,
                'street_address' => $this->street_address,
                'town_city' => $this->town_city,
                'district' => $this->district,
                'province' => $this->province,
                'postcode' => $this->postcode,
                'user_id' => auth()->id()
            ]);
            sweetAlert()->addSuccess('We have successfully saved your shipping address.');
        } else {
            $address = Address::find($this->address_id);
            $address->first_name = $this->first_name;
            $address->last_name = $this->last_name;
            $address->phone_number = $this->phone_number;
            $address->street_address = $this->street_address;
            $address->town_city = $this->town_city;
            $address->district = $this->district;
            $address->province = $this->province;
            $address->postcode = $this->postcode;
            $address->user_id = auth()->id();
            sweetAlert()->addSuccess('We have successfully updated your shipping address.');

            $address->save();
        }
    }

    public function resetAddress()
    {
        $addressExist = Address::where('user_id', auth()->id())->first();
        if ($addressExist) {
            $this->address_id = $addressExist->id;
            $address = Address::find($this->address_id);
            $this->first_name = $address->first_name;
            $this->last_name = $address->last_name;
            $this->phone_number = $address->phone_number;
            $this->street_address = $address->street_address;
            $this->town_city = $address->town_city;
            $this->district = $address->district;
            $this->province = $address->province;
            $this->postcode = $address->postcode;
        }
    }
    public function payment()
    {
        return redirect()->route('user.user-payment');
    }

    public function render()
    {
        $this->cartitems = Cart::with('products')->where(['user_id' => auth()->user()->id])->get();
        return view('livewire.pages.users.shipping-address');
    }
}
