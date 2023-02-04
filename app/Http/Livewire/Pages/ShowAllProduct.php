<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;

class ShowAllProduct extends Component
{
    public $product, $productDetail, $search;
    public $productDetailModal = false;

    public function mount($category)
    {
        $this->product = Product::where('product_category', $category)->get();
    }

    public function showProductDetails($id)
    {
        $this->productDetail = Product::find($id);
        $this->productDetailModal = true;
    }

    protected $queryString = ['search'];

    public function render()
    {

        // return view('livewire.pages.show-all-product')->with(['productData' => $this->product]);
        return view('livewire.pages.show-all-product', ['productData' => $this->search === null ? Product::paginate(10) : Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(10),]);
    }
}
