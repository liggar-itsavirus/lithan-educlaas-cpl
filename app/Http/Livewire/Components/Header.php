<?php

namespace App\Http\Livewire\Components;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{

    public $total = 0;

    protected $listeners = ['updateCartCount' => 'addProductToChart'];

    public function addProductToChart()
    {
        $this->total = Cart::whereUserId(auth()->user()->id)->count();
    }
    public function render()
    {
        if (Auth::check()) {
            $this->addProductToChart();
        }
        return view('livewire.components.header');
    }
}
