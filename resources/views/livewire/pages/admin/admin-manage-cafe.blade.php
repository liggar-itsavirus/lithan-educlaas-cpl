<div>
    <div class="container mx-auto h-full py-10">
        <button type="button"
            class="border-2 border-[#3C2A21] text-[#3C2A21] py-3 px-4 my-10 rounded-lg hover:bg-[#3C2A21] hover:text-[#E5E5CB] hover:border-[#E5E5CB]"
            wire:click='showAddMenuModal(null)' name="addMenu">Add
            Menu</button>
        <div class="overflow-x-auto relative shadow-md sm:rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">No.</th>
                        <th scope="col" class="py-3 px-6">Menu Name</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Menu Category</th>
                        <th scope="col" class="py-3 px-6">Menu Description</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Menu Image</th>
                        <th scope="col" class="py-3 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menuData as $index => $menu)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $index + 1 }}</td>
                            <td class="py-4 px-6">{{ $menu->menu_name }}</td>
                            <td
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $menu->menu_category }}</td>
                            <td class="py-4 px-6">{{ $menu->menu_descriptions }}</td>
                            <td
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                <img class="mx-auto" src="{{ asset('storage/' . $menu->menu_image) }}" alt=""
                                    width="100px">
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex gap-3">
                                    <button class="text-yellow-600 hover:text-yellow-900"
                                        wire:click='showAddMenuModal({{ $menu->id }})'><i
                                            class="fa-solid fa-pen-to-square fa-xl"></i></button>
                                    <button class="text-sky-600 hover:text-sky-900"><i
                                            class="fa-solid fa-eye fa-xl"></i></button>
                                    <button class="text-red-600 hover:text-red-900" type="button"
                                        wire:click='deleteMenu({{ $menu->id }})'><i
                                            class="fa-solid fa-trash fa-xl"></i></button>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-lg font-medium py-4" colspan="6 ">No Product</td>
                        </tr>
                    @endforelse
                </tbody>
                <div class="p-5">{{ $menuData->links('pagination::tailwind') }}</div>
            </table>
            <div class="p-5">{{ $menuData->links('pagination::tailwind') }}</div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model='addMenuModal' class="flex items-center">
        <x-slot name='title' class="text-5xl">
            @if (!$menu_id)
                Add Menu
            @else
                Update Menu
            @endif
        </x-slot>

        <x-slot name='content'>
            <form wire:submit.prevent='submit'>
                @csrf
                <div class="mb-3 hidden">
                    <div class="label">
                        <label for="add-menu">Add Menu</label>
                        @error('id')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='menu_id' readonly
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="menuId" placeholder="Menu Id" name="menu_id">
                </div>
                <div class="mb-3 ">
                    <div class="label">
                        <label for="add-menu">Menu Name</label>
                        @error('menu_name')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model='menu_name'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="menu_name" placeholder="Menu Name" name="menu_name">
                </div>
                <div class="mb-3 ">
                    <div class="label">
                        <label for="add-menu">Menu Category</label>
                        @error('menu_category')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <select name="menu_category" id="menu_category" wire:model='menu_category'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid bordergray300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="Choose category" hidden>Choose Category</option>
                        <option value="Meals">Meals</option>
                        <option value="Beverages">Beverages</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="menu_descriptions">Menu Description</label>
                        @error('menu_description')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <textarea name="menu_descriptions" id="menu_descriptions" cols="30" rows="5" placeholder="Menu description"
                        wire:model='menu_descriptions'
                        class="form-control block w-full px-3 py-2 text-base
                    font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition
                    ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="menu_image">Menu Image</label>
                    </div>
                    <input type="file" wire:model='menu_image'
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="menu_image" placeholder="Menu image" name="menu_image">
                </div>
                <button class="px-3 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded-md font-medium"
                    type="button" wire:click="$toggle('addMenuModal')"
                    wire:loading.attr="disabled">Nevermind</button>
                <button class="ml-2 px-3 py-2 bg-sky-700 hover:bg-sky-900 text-white rounded-md font-medium"
                    wire:loading.attr="disabled" type="submit">
                    @if (!$menu_id)
                        Add Menu
                    @else
                        Update Menu
                    @endif
                </button>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
</div>
