<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Outlet;
use Livewire\Component;

class UserOutlet extends Component
{
    public $outlets;

    public function mount()
    {
        $this->outlets = Outlet::get();
    }

    public function render()
    {
        return view('livewire.pages.users.user-outlet')->with(['outlets' => $this->outlets]);
    }
}
