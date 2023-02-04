<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;

class Welcome extends Component
{
    public $product, $productDetail;
    public $productDetailModal = false;

    public function showProductDetails($id)
    {
        $this->productDetail = Product::find($id);
        $this->productDetailModal = true;
    }

    public function render()
    {
        $productCoffeeBeans = Product::where('product_category', 'Coffee Beans')->paginate(4);
        $productBrewingKit = Product::where('product_category', 'Coffee Equipments')->paginate(4);
        return view('welcome')->with(['coffeeBeans' => $productCoffeeBeans, 'brewingKit' => $productBrewingKit]);
    }
}
