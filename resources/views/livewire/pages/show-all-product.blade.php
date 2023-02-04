<div>
    <div>
        <div>
            <div class="bg-cover bg-no-repeat bg-center py-44"
                style="background-image: url('https://preview.colorlib.com/theme/timezone/assets/img/hero/about_hero.png.webp');">
                <div class="container mx-auto flex justify-center">
                    @forelse ($productData as $product)
                        @if ($loop->first)
                            <h1 class="text-6xl text-gray-800 font-medium mb-4 uppercase">
                                {{ $product->first()->product_category }}</h1>
                        @endif
                    @empty
                        <h1 class="text-2xl text-gray-800 font-medium mb-4 uppercase">
                            We're sorry, we were unable to locate the item you were searching for.</h1>
                    @endforelse
                </div>
            </div>

            <form class="mx-auto container pt-6">
                <div class="flex">
                    <label for="search-dropdown"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                        Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Default
                                    sorting</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sort
                                    by popularity</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sort
                                    by average rating</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sort
                                    by latest</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex text-left w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sort
                                    by price: low to high</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex text-left w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sort
                                    by price: high to low</button>
                            </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" wire:model='search'
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search...">
                        <button type="submit" disabled
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

            <div class="mx-auto container contrast-more: py-8">
                <div class="flex flex-wrap items-center justify-center">
                    @forelse ($productData as $product)
                        <div tabindex="0" class="focus:outline-none mx-2 mb-8 hover:shadow-xl">
                            <div class="bg-white rounded-t flex items-center justify-center"><img
                                    src="{{ asset('storage/' . $product->product_image) }}" alt=""
                                    class="focus:outline-none w-auto h-56 object-cover rounded-t">
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-b ">
                                <div class="flex items-center justify-between px-4 pt-4">
                                    <div><i class="fa-solid fa-bookmark"></i></div>
                                    <div class="bg-sky-200 py-1.5 px-6 rounded-full">
                                        <p tabindex="0" class="focus:outline-none text-xs text-sky-700">
                                            {{ $product->product_category }}</p>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex items-center justify-between">
                                        <h2 tabindex="0"
                                            class="focus:outline-none text-lg dark:text-white font-semibold cursor-default">
                                            {{ \Illuminate\Support\Str::limit($product->product_name, $limit = 20, $end = '...') }}
                                        </h2>
                                        <p tabindex="0"
                                            class="focus:outline-none text-xs text-gray-600 dark:text-gray-200 pl-5">4
                                            days ago
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fa fa-star text-yellow-400 fa-sm"></span>
                                        <span class="fa fa-star text-yellow-400 fa-sm"></span>
                                        <span class="fa fa-star text-yellow-400 fa-sm"></span>
                                        <span class="fa fa-star fa-sm"></span>
                                        <span class="fa fa-star fa-sm"></span>
                                    </div>
                                    <p tabindex="0"
                                        class="focus:outline-none text-xs text-gray-600 dark:text-gray-200 mt-2 cursor-default">
                                        {{ \Illuminate\Support\Str::limit($product->product_description, $limit = 50, $end = '...') }}
                                    </p>
                                    <div class="flex items-center justify-between py-4">
                                        <h3 tabindex="0"
                                            class="focus:outline-none text-sky-700 text-xl font-semibold">$
                                            {{ $product->product_price }}
                                        </h3>
                                        <button wire:click="showProductDetails({{ $product->id }})"
                                            class="py-2 px-4 border-2 rounded-full border-sky-700 hover:bg-sky-700 hover:text-white">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-3xl font-semibold py-14 text-center pb-60">No Product</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="productDetailModal" maxWidth="4xl" class="flex items-center">
        <x-slot name="title" class="text-5xl">
            Product Detail
            <div class="cursor-pointer" wire:click="$toggle('productDetailModal')">
                <i class="fa-solid fa-close fa-xl"></i>
            </div>
        </x-slot>

        <x-slot name="content">
            @if (isset($this->productDetail))
                <div class="flex gap-7">
                    <div class="w-full sm:w-96 md:w-8/12 lg:w-6/12 items-center">
                        <h6
                            class="font-semibold lg:text-2xl text-xl lg:leading-9 leading-7 text-gray-800 dark:text-white mt-4">
                            {{ $productDetail->product_name }}
                        </h6>
                        <div class="flex flex-row items-center justify-between mt-5">
                            <div>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 font-normal text-base leading-4 text-gray-700 hover:underline hover:text-gray-800 dark:text-white duration-100 cursor-pointer">
                                22 reviews</p>
                        </div>
                        <p class="font-normal text-base leading-6 text-gray-600  mt-7">
                            {{ $productDetail->product_description }}
                        </p>
                        <div class="flex justify-between items-center">
                            <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 mt-6 dark:text-white">$
                                {{ $productDetail->product_price }}</p>
                            <p>Stock available: {{ $productDetail->product_quantity }}</p>
                        </div>
                        <button wire:click="$toggle('addOrderModal')"
                            class="focus:outline-none focus:ring-2 hover:bg-black focus:ring-offset-2 focus:ring-gray-800 font-medium text-base leading-4 text-white bg-gray-800 w-full py-5 lg:mt-12 mt-6 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">Order</button>
                    </div>
                    <div class=" sm:w-96 md:w-8/12 lg:w-6/12 flex lg:flex-row flex-col lg:gap-8 sm:gap-6 gap-4">
                        <img src="{{ asset('storage/' . $productDetail->product_image) }}"
                            alt="Product: {{ $productDetail->product_name }}" />
                    </div>
                </div>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>
</div>
