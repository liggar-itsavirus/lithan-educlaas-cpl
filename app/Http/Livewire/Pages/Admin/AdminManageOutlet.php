<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminManageOutlet extends Component
{
    public $addOutletModal = false;
    public $outlet_id, $outlet_name, $street_address, $district, $town_city, $province, $postcode, $phone_number;
    protected $rules = [
        'outlet_name' => 'required|min:3',
        'street_address' => 'required',
        'district' => 'required',
        'town_city' => 'required',
        'province' => 'required',
        'postcode' => 'required',
        'phone_number' => 'required',
    ];

    public function mount()
    {
    }

    public function submit()
    {
        $this->validate();
        if (!$this->outlet_id) {
            Outlet::create([
                'outlet_name' => $this->outlet_name,
                'street_address' => $this->street_address,
                'district' => $this->district,
                'town_city' => $this->town_city,
                'province' => $this->province,
                'postcode' => $this->postcode,
                'phone_number' => $this->phone_number,
                'user_id' => auth()->id()
            ]);
            sweetalert()->addSuccess('Add Outlet successfully');
        } else {
            $outlet = Outlet::find($this->outlet_id);
            $outlet->outlet_name = $this->outlet_name;
            $outlet->street_address = $this->street_address;
            $outlet->district = $this->district;
            $outlet->town_city = $this->town_city;
            $outlet->province = $this->province;
            $outlet->postcode = $this->postcode;
            $outlet->phone_number = $this->phone_number;
            $outlet->user_id = auth()->id();

            sweetalert()->addsuccess('Update Outle successfully');

            $outlet->save();
        }
        return $this->addOutletModal = false;
    }

    public function showAddOutletModal($id)
    {
        $this->outlet_id = $id;
        if ($this->outlet_id) {
            $outlet = Outlet::find($this->outlet_id);
            $this->outlet_name = $outlet->outlet_name;
            $this->street_address = $outlet->street_address;
            $this->district = $outlet->district;
            $this->town_city = $outlet->town_city;
            $this->province = $outlet->province;
            $this->postcode = $outlet->postcode;
            $this->phone_number = $outlet->phone_number;
        }
        $this->addOutletModal = true;
    }

    public function deleteOutlet($id)
    {
        Outlet::find($id)->delete();
    }

    public function render()
    {
        $outlet_data = Outlet::paginate(12);
        return view('livewire..pages.admin.admin-manage-outlet', (['outlet_data' => $outlet_data]));
    }
}
