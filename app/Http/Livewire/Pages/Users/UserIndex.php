<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class UserIndex extends Component
{
    public $product, $productDetail, $search, $searchResult;
    public $order_quantity = 1;
    public $productDetailModal = false;
    protected $queryString = ['search'];

    public function showProductDetails($id)
    {
        $this->productDetail = Product::find($id);
        $this->productDetailModal = true;
    }

    public function plus()
    {
        if ($this->order_quantity !== $this->productDetail->product_quantity) {
            $this->order_quantity++;
        }
    }

    public function minus()
    {
        if ($this->order_quantity !== 1) {
            $this->order_quantity--;
        }
    }


    public function addToCart($id)
    {
        $existProduct = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
        if (!$existProduct) {
            $cart_data = ['user_id' => auth()->user()->id, 'product_id' => $id, 'amount' => $this->order_quantity];
            Cart::updateOrCreate($cart_data);
            sweetAlert()->addSuccess('Product added to the Cart successfully');
        } else {
            $existProduct->amount += $this->order_quantity;
            $existProduct->save();
            sweetAlert()->addSuccess('Product added to the Cart successfully');
        }
        $this->productDetailModal = false;
        $this->emit('updateCartCount');
    }

    public function render()
    {
        $product_data = Product::whereNot('product_quantity', '<=', '0')->paginate(8);
        if ($this->search !== null) {
            $product_data = Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(8);
        }
        return view('livewire.pages.users.user-index', ['productData' => $product_data])->layout('layouts.app')->layoutData(['title' => 'User Home']);
    }
}
