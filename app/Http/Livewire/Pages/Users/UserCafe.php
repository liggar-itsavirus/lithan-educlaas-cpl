<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\Cafe;
use Livewire\Component;

class UserCafe extends Component
{
    public $menus, $menu_category, $menu;

    public function mount($menu_category)
    {
        $this->menus = Cafe::where('menu_category', $menu_category)->get();
        $this->menu = $this->menus->where('menu_category', $menu_category);
    }
    public function render()
    {
        return view('livewire.pages.users.user-cafe')->with(['menu_data' => $this->menus]);
    }
}
