<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class ShowAllProduct extends Component
{
    public $product, $productDetail, $search, $searchResult, $productCategory;
    public $order_quantity = 1;
    public $productDetailModal = false;

    public function mount($category)
    {
        // $this->product = Product::where('product_category', $category)->get();
        $this->product = Product::query();

        if (!empty($category)) {
            $this->productCategory = $category;
            $this->product = $this->product->where('product_category', $category);
        }

        if (!empty($this->search)) {
            $this->product = $this->product->where('product_name', 'like', '%' . $this->search . '%');
        }
        $this->product = $this->product->get();
        // if (!$this->search) {
        //     $this->product;
        // } else {
        //     $this->product->where('product_name', 'like', '%' . $this->search . '%');
        // }
    }

    public function search()
    {
        $this->product = Product::query();
        $this->product = $this->product->where('product_category', $this->productCategory);
        $this->product = $this->product->where('product_name', 'like', '%' . $this->search . '%');
        $this->product = $this->product->get();
    }

    public function showProductDetails($id)
    {
        $this->productDetail = Product::find($id);
        $this->productDetailModal = true;
        $this->order_quantity = 1;
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
        // return view('livewire.pages.users.show-all-product')->with(['productData' => $this->product]);
        return view('livewire.pages.users.show-all-product', ['productData' => $this->product]);
    }
}
