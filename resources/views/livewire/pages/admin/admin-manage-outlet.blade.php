<div>
    <div class="container mx-auto h-full py-10"><button type="button"
            class="border-2 border-[#3C2A21] text-[#3C2A21] py-3 px-4 my-10 rounded-lg hover:bg-[#3C2A21] hover:text-[#E5E5CB] hover:border-[#E5E5CB]"
            wire:click='showAddOutletModal(null)' name="addOutlet">Add
            Outlet</button>
        <div class="oveflow-x-auto relative shadow-md sm:rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">No.</th>
                        <th scope="col" class="py-3 px-6">Outlet Name</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Street Address</th>
                        <th scope="col" class="py-3 px-6">District</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Town / City</th>
                        <th scope="col" class="py-3 px-6">Province</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Postcode</th>
                        <th scope="col" class="py-3 px-6">Phone Number</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($outlet_data as $index => $outlet_item)
                        <tr>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $index + 1 }}</td>
                            <td class="py-4 px-6">{{ $outlet_item->outlet_name }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $outlet_item->street_address }}</td>
                            <td class="py-4 px-6">{{ $outlet_item->district }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $outlet_item->town_city }}</td>
                            <td class="py-4 px-6">{{ $outlet_item->province }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $outlet_item->postcode }}</td>
                            <td class="py-4 px-6">{{ $outlet_item->phone_number }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                <div class="flex gap-3">
                                    <button class="text-yellow-600 hover:text-yellow-900"
                                        wire:click='showAddOutletModal({{ $outlet_item->id }})'><i
                                            class="fa-solid fa-pen-to-square fa-xl"></i></button>
                                    <button class="text-sky-600 hover:text-sky-900"><i
                                            class="fa-solid fa-eye fa-xl"></i></button>
                                    <button class="text-red-600 hover:text-red-900" type="button"><i
                                            class="fa-solid fa-trash fa-xl"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model='addOutletModal' class="flex items-center">
        <x-slot name='title' class="text-5xl">
            @if (!$outlet_id)
                Add Outlet
            @else
                Update Outlet
            @endif
        </x-slot>
        <x-slot name='content'>
            <form wire:submit.prevent='submit'>
                @csrf
                <div class="mb-3 hidden">
                    <div class="label">
                        <label for="outlet_id">Outlet Id</label>
                        @error('id')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='outlet_id' readonly
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="outlet_id" placeholder="Outlet Id" name="outlet_id">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="outlet_name">Outlet Name</label>
                        @error('outlet_name')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='outlet_name'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="outlet_name" placeholder="Outlet Name" name="outlet_name">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="street_address">Street Address</label>
                        @error('street_address')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='street_address'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="street_address" placeholder="Street address" name="street_address">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="district">District</label>
                        @error('district')
                            <span class="error text-red-700">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='district'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="district" placeholder="District" name="district">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="town_city">Town City</label>
                        @error('town_city')
                            <span class="error text-red-700">Error message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='town_city'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="town_city" placeholder="Town city" name="town_city">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="province">Province</label>
                        @error('province')
                            <span class="error text-red-700">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='province'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="province" placeholder="Province" name="province">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="postcode">Post Code</label>
                        @error('postcode')
                            <span class="error text-red-700">Error message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='postcode'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="postcode" placeholder="Postcode" name="postcode">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="phone_number">Phone Number</label>
                        @error('phone_number')
                            <span class="error text-red-700">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='phone_number'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="phone_number" placeholder="Phone number" name="phone_number">
                </div>
                <button class="px-3 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded-md font-medium"
                    type="button" wire:click="$toggle('addOutletModal')"
                    wire:loading.attr="disabled">Nevermind</button>
                <button class="ml-2 px-3 py-2 bg-sky-700 hover:bg-sky-900 text-white rounded-md font-medium"
                    wire:loading.attr="disabled" type="submit">
                    @if (!$outlet_id)
                        Add Outlet
                    @else
                        Update Outlet
                    @endif
                </button>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
</div>
