<div>
    <div class="container mx-auto h-full py-10">
        <button
            class="border-2 border-[#3C2A21] text-[#3C2A21] py-3 px-4 my-10 rounded-lg hover:bg-[#3C2A21] hover:text-[#E5E5CB] hover:border-[#E5E5CB]"
            wire:click="showAddProductModal(null)" name="addProduct">
            Add Product
        </button>
        <div class="overflow-x-auto relative shadow-md sm:rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Name</th>
                        <th scope="col" class="py-3 px-6">Product Category</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Description</th>
                        <th scope="col" class="py-3 px-6">Product Image</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Price</th>
                        <th scope="col" class="py-3 px-6">Product Quantity</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Action</th>
                    </tr>
                </thead>
                @forelse ($productData as $product)
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $product->product_name }}
                            </th>
                            <td class="py-4 px-6">{{ $product->product_category }}</td>
                            <td class="py-4 px-6 dark:bg-gray-50">{{ $product->product_description }}
                            </td>
                            <td class="py-4 px-6"><img src="{{ asset('storage/' . $product->product_image) }}"
                                    width="100px" alt="Product Image"></td>
                            <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">$ {{ $product->product_price }}</td>
                            <td class="py-4 px-6">{{ $product->product_quantity }}</td>
                            <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800 h-full">
                                <div class="flex gap-3">
                                    <button class="text-yellow-600 hover:text-yellow-900"><i
                                            class="fa-solid fa-pen-to-square fa-xl"
                                            wire:click="showAddProductModal({{ $product->id }})"></i></button>
                                    <button class="text-sky-600 hover:text-sky-900"><i
                                            class="fa-solid fa-eye fa-xl"></i></button>
                                    <button class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash fa-xl"
                                            wire:click="deleteProduct({{ $product->id }})"></i>

                                    </button>
                                </div>
                            </td>
                        @empty
                            <td class="text-center text-lg font-medium py-4" colspan="7">No Product</td>
                        </tr>
                    </tbody>
                @endforelse
                <div class="p-5">{{ $productData->links('pagination::tailwind') }}</div>
            </table>
            <div class="p-5">{{ $productData->links('pagination::tailwind') }}</div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="addProductModal" class="flex items-center">
        <x-slot name="title" class="text-5xl">
            @if (!$productId)
                Add Product
            @else
                Update Product
            @endif
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="submit">
                @csrf
                <div class="mb-3 hidden">
                    <div class="label">
                        <label for="">Add Product</label>
                        @error('id')
                            <span class="error text-red-500"> Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model="productId" readonly
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput1" placeholder="Product Id" name="id">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Name:</label>
                        @error('product_name')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="text" wire:model="product_name"
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput1" placeholder="Product Name" name="product_name">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Category:</label>
                        @error('product_category')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <select name="product_category" id="product_category" wire:model="product_category"
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="" hidden>Product Category</option>
                        <option value="Coffee Beans">Coffee Beans</option>
                        <option value="Ground Coffee">Ground Coffee</option>
                        <option value="Capsule Coffee">Capsule Coffee</option>
                        <option value="Capsule Machine">Capsule Machine</option>
                        <option value="Single Serving">Single Serving</option>
                        <option value="Coffee Equipments">Coffee Equipments</option>
                        <option value="Brewing Kit">Brewing Kit</option>
                        <option value="Bundling Package">Bundling Package</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Descrition:</label>
                        @error('product_description')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <textarea wire:model="product_description"
                        class="form-control block w-full px-3 py-2 text-base
                        font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition
                        ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="product_description" id="product_description" cols="30" rows="5" placeholder="Product Description"></textarea>
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Image</label>
                        @error('product_image')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="file" wire:model="product_image"
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput1" placeholder="Product Image" name="product_image">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Price</label>
                        @error('product_price')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="number" wire:model="product_price"
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput1" placeholder="Product Price" name="product_price">
                </div>
                <div class="mb-3">
                    <div class="label">
                        <label for="">Product Quantity</label>
                        @error('proudct_quantity')
                            <span class="error text-red-500">Error Message</span>
                        @enderror
                    </div>
                    <input type="number" wire:model="product_quantity"
                        class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput1" placeholder="Product Quantity" name="product_quantity">
                </div>
                <button class="px-3 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded-md font-medium"
                    type="button" wire:click="$toggle('addProductModal')"
                    wire:loading.attr="disabled">Nevermind</button>
                <button class="ml-2 px-3 py-2 bg-sky-700 hover:bg-sky-900 text-white rounded-md font-medium"
                    wire:loading.attr="disabled" type="submit">
                    @if (!$productId)
                        Add Product
                    @else
                        Update Proudct
                    @endif
                </button>
            </form>
        </x-slot>

    </x-jet-dialog-modal>
</div>
