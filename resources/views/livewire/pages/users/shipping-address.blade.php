<div>
    <div class="container mx-auto h-full py-1">
        <div class="oveflow-x-auto relative shadow-md sm:rounded"></div>
    </div>
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-2/3 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shipping Address</h1>
                </div>
                <div>
                    <form wire:submit.prevent='submit'>
                        @csrf
                        <div class="grid md:grid-cols-2 md:gap-2 my-3">
                            <div class="mb-3">
                                <div class="label">
                                    <label for="">First Name <span class="text-red-500">*</span></label>
                                    @error('first_name')
                                        <span class="error text-red-500">Error message</span>
                                    @enderror
                                </div>
                                <input type="text" wire:model='first_name'
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                            </div>
                            <div class="mb-3">
                                <div class="label">
                                    <label for="">Last Name <span class="text-red-500">*</span></label>
                                    @error('last_name')
                                        <span class="error text-red-500">Error message</span>
                                    @enderror
                                </div>
                                <input type="text" wire:model='last_name'
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                            </div>
                            <div class="mb-3">
                                <div class="label">
                                    <label for="">Phone Number <span class="text-red-500">*</span></label>
                                    @error('phone_number')
                                        <span class="error text-red-500">Error message</span>
                                    @enderror
                                </div>
                                <input type="tel" wire:model='phone_number'
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            </div>
                            <div class="mb-3">
                                <div class="label">
                                    <label for="">Country / Region <span class="text-red-500">*</span></label>
                                    @error('country')
                                        <span class="error text-red-500">Error message</span>
                                    @enderror
                                </div>
                                <input type="text"
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                                    value="Indonesia" disabled readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="label">
                                <label for="">Street Address<span class="text-red-500">*</span></label>
                                @error('street_address')
                                    <span class="error text-red-500">Error message</span>
                                @enderror
                            </div>
                            <input type="text" wire:model='street_address'
                                class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        </div>
                        <div class="mb-3">
                            <div class="label">
                                <label for="">Town / City<span class="text-red-500">*</span></label>
                                @error('town_city')
                                    <span class="error text-red-500">Error message</span>
                                @enderror
                            </div>
                            <input type="text" wire:model='town_city'
                                class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        </div>
                        <div class="mb-3">
                            <div class="label">
                                <label for="">District<span class="text-red-500">*</span></label>
                                @error('district')
                                    <span class="error text-red-500">Error message</span>
                                @enderror
                            </div>
                            <input type="text" wire:model='district'
                                class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        </div>
                        <div class="mb-3">
                            <div class="label">
                                <label for="">Province<span class="text-red-500">*</span></label>
                                @error('province')
                                    <span class="error text-red-500">Error message</span>
                                @enderror
                            </div>
                            <input type="text" wire:model='province'
                                class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        </div>
                        <div class="mb-3">
                            <div class="label">
                                <label for="">Postcode / ZIP<span class="text-red-500">*</span></label>
                                @error('postcode')
                                    <span class="error text-red-500">Error message</span>
                                @enderror
                            </div>
                            <input type="text" wire:model='postcode'
                                class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        </div>
                        <div class="justify-between flex">
                            <div>
                                <a href="{{ route('user.shopping-cart') }}"
                                    class="flex font-semibold text-indigo-600 text-sm mt-10">
                                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                                        <path
                                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                                    </svg>
                                    Back to cart
                                </a>
                            </div>
                            <div><button type="button" wire:click='resetAddress'
                                    class="px-3 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded-md font-medium">Nevemind</button>
                                <button
                                    class="ml-2 px-3 py-2 bg-sky-700 hover:bg-sky-900 text-white rounded-md font-medium mt-10">
                                    @if (!$address_id)
                                        Save
                                    @else
                                        Update
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="summary" class="w-1/3 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{ $cartitems->count() }} </span>
                </div>
                @forelse ($cartitems as  $cart_item)
                    <div class="flex justify-between w-full mb-4">
                        <div class="w-1/4 "><img src="{{ asset('storage/' . $cart_item->products->product_image) }}"
                                alt="{{ $cart_item->products->product_name }}"></div>
                        <div class="w-3/4 ml-3">
                            <div class="mb-3">
                                <div class="font-semibold flex text-sm justify-between uppercase">
                                    <span>{{ $cart_item->products->product_name }}</span>
                                    <span>${{ $cart_item->products->product_price * $cart_item->amount }}</span>
                                </div>
                                <div class="flex justify-between text-xs mt-1">
                                    <span>Quantity: {{ $cart_item->amount }}</span>
                                    <span>${{ $cart_item->products->product_price }} each</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <div class="border-t mt-8">
                    <div class="flex justify-between pt-3 text-sm ">
                        <span>Total Price</span>
                        <span>{{ $this->totalPrice }}</span>
                    </div>
                    <div class="flex justify-between pt-3 text-sm ">
                        <span>Delivery fee</span>
                        <span>{{ $defaultshipping }}</span>
                    </div>
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>{{ $this->totalPrice + $defaultshipping }}</span>
                    </div>
                    <button wire:click="payment"
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Continue
                        to payment</button>
                </div>
            </div>
        </div>
    </div>
</div>
