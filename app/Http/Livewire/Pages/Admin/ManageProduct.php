<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageProduct extends Component
{
    use WithFileUploads;
    public $addProductModal = false;
    public $product_name, $product_category, $product_description, $product_image, $product_price, $product_quantity;
    public $productId;

    protected $rules = [
        'product_name' => 'required|min:6',
        'product_category' => 'required',
        'product_description' => 'required',
        'product_image' => 'required|image|max:3072',
        'product_price' => 'required',
        'product_quantity' => 'required',
    ];

    public function mount()
    {
        // $this->flasher->addSuccess('Data has been saved successfully!');
    }

    public function submit()
    {
        $this->validate();
        if (!$this->productId) {
            Product::create([
                'product_name' => $this->product_name,
                'product_category' => $this->product_category,
                'product_description' => $this->product_description,
                'product_price' => $this->product_price,
                'product_quantity' => $this->product_quantity,
                'product_image' => $this->product_image->store('product', 'public'),
                'user_id' => auth()->id()
            ]);
            $this->product_image->store('product', 'public');
            sweetAlert()->addSuccess('Add Product Successfuly');
        } else {
            $product = Product::find($this->productId);
            $product->product_name = $this->product_name;
            $product->product_category = $this->product_category;
            $product->product_description = $this->product_description;
            $product->product_price = $this->product_price;
            $product->product_quantity = $this->product_quantity;
            $product->user_id = auth()->id();

            if ($this->product_image) {
                $product->product_image = $this->product_image->store('product', 'public');
                $this->product_image->store('product');
            }
            sweetAlert()->addSuccess('Update Product Successfuly');

            $product->save();
        }
        return $this->addProductModal = false;
    }

    public function showAddProductModal($id)
    {
        $this->productId = $id;
        if ($this->productId) {
            $product = Product::find($this->productId);
            $this->product_name = $product->product_name;
            $this->product_category = $product->product_category;
            $this->product_description = $product->product_description;
            $this->product_image = $product->product_image;
            $this->product_price = $product->product_price;
            $this->product_quantity = $product->product_quantity;
        }
        $this->addProductModal = true;
    }


    public function deleteProduct($id)
    {
        Product::find($id)->delete();
    }

    public function render()
    {
        $product_data = Product::whereNot('product_quantity', '<=', '0')->paginate(10);
        return view('livewire.pages.admin.manage-product', ['productData' => $product_data])->layoutData(['title' => 'Admin Dasboard']);
    }
}
