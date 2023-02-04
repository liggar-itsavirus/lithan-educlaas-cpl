<div>
    <div class="container mx-auto h-full py-1">
        <div class="oveflow-x-auto relative shadow-md sm:rounded"></div>
    </div>
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10 items-center">
            <div class="w-full bg-white px-64 py-10 items-center justify-items-center">
                <h1 class="font-semibold text-2xl mb-5">Shipping Address</h1>
                <div class="">
                    <form wire:submit.prevent='submit'>
                        @csrf
                        <div class="grid md:grid-cols-2 md:gap-2 my-3">
                            <div class="mb-3">
                                <label for="">First Name <span class="text-red-500">*</span></label>
                                @error('first_name')
                                    <span class="error text-red-500">Error Message</span>
                                @enderror
                                <input type="text" wire:model="first_name"
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "">
                            </div>
                            <div class="mb-3">
                                <label for="">Last Name <span class="text-red-500">*</span></label>
                                @error('last_name')
                                    <span class="error text-red-500">Error Message</span>
                                @enderror
                                <input type="text" wire:model='last_name'
                                    class="mt-1 form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "">
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
                        <button wire:click="resetAddress"
                            class="px-3 py-2 bg-gray-700 hover:bg-gray-900 text-white rounded-md font-medium"
                            type="button">Nevermind</button>
                        <button class="ml-2 px-3 py-2 bg-sky-700 hover:bg-sky-900 text-white rounded-md font-medium"
                            type="submit">
                            @if (!$address_id)
                                Save
                            @else
                                Update
                            @endif
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
