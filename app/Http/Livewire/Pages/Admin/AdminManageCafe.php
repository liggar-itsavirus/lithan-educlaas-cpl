<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Cafe;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminManageCafe extends Component
{
    use WithFileUploads;
    public $addMenuModal = false;
    public $menu_id, $menu_name, $menu_category, $menu_descriptions, $menu_image;
    protected $rules = [
        'menu_name' => 'required|min:6',
        'menu_category' => 'required',
        'menu_descriptions' => 'required',
        'menu_image' => 'required|image|max:3072'
    ];

    public function mount()
    {
    }

    public function submit()
    {
        $this->validate();
        if (!$this->menu_id) {
            Cafe::create([
                'menu_name' => $this->menu_name,
                'menu_category' => $this->menu_category,
                'menu_descriptions' => $this->menu_descriptions,
                'menu_image' => $this->menu_image->store('menu', 'public'),
                'user_id' => auth()->id()
            ]);

            $this->menu_image->store('menu', 'public');
            sweetAlert()->addSuccess('Add menu successfully');
        } else {
            $menu = Cafe::find($this->menu_id);
            $menu->menu_name = $this->menu_name;
            $menu->menu_category = $this->menu_category;
            $menu->menu_descriptions = $this->menu_descriptions;
            $menu->menu_image = $this->menu_image;
            $menu->user_id = auth()->id();

            if ($this->menu_image) {
                $menu->menu_image = $this->menu_image->store('menu', 'public');
                $this->menu_image->store('menu', 'public');
            }
            sweetAlert()->addSuccess('Update menu successfully');

            $menu->save();
        }
        return $this->addMenuModal = false;
    }

    public function showAddMenuModal($id)
    {
        $this->menu_id = $id;
        if ($this->menu_id) {
            $menu = Cafe::find($this->menu_id);
            $this->menu_name = $menu->menu_name;
            $this->menu_category = $menu->menu_category;
            $this->menu_descriptions = $menu->menu_descriptions;
            $this->menu_image = $menu->menu_image;
        }
        $this->addMenuModal = true;
    }

    public function deleteMenu($id)
    {
        Cafe::find($id)->delete();
    }

    public function render()
    {
        $menu_data = Cafe::paginate(12);
        return view('livewire.pages.admin.admin-manage-cafe', (['menuData' => $menu_data]));
    }
}
